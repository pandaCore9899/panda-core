<?php

namespace App\Utils;

use Exception;
use Illuminate\Http\Request;

use App\Utils\ExcelManager;
use Illuminate\Support\Facades\Validator;

trait Importer
{
    use ExcelManager;

    private $msgs = null;

    public function importIndex()
    {
        return view('pages.static.import.import', [
            'model' => $this->model
        ]);
    }

    public function importColumns(Request $req)
    {
        if (function_exists('customImportColumn')) {
            return $this->customImportColumn();
        } else {
            $columns = $this->displayColumns($req);
            unset($columns['id']);
            $columns = array_merge(['row' => [
                'show' => true
            ]], $columns);
            return $columns;
        }
    }

    public function importRules()
    {

        return [
            'email' => 'required|unique:users,email,NULL,id,deleted_at,NULL'
        ];
    }
    public function validateImportData(&$data, $messages = null, &$avaiableItems)
    {
        $rules = $this->importRules();
        $isValidated = true;
        $validRows = [];
        $this->msgs = new MessageManager();
        foreach ($data as $d) {
            $validator = Validator::make($d, $rules);
            if ($validator->fails()) {
                foreach ($validator->getMessageBag()->getMessages() as $name => $message) {
                    $this->msgs->addErrorMsg(trans('common.function.import.row').' ' . $d['row'] . ' :' . $this->model::translateWithFormat($message[0], $name));
                }
                $isValidated = false;
            } else {
                array_push($validRows, $d['row']);
            }
        }
        $data = collect($data)->map(function($element) use ($validRows){
            $element['valid'] = in_array($element['row'], $validRows);
            return $element;
        })->toArray();
        return $isValidated;
    }
    public function confirmFormInput(Request $req)
    {

        $file = $req->file('import_file');
        $import_type = $req->get('import_type');

        if ($import_type == null) {
            $this->msgs->addErrorMsg(trans('alert/common.empty', [
                'field' => trans('common.function.import.import_type')
            ]));
        } else if ($file == null) {
            $this->msgs->addErrorMsg(trans('alert/common.empty', [
                'field' => trans('common.function.import.import_file')
            ]));
        } else {
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'csv' && $extension != 'xls' && $extension != 'xlsx') {
                $this->msgs->addErrorMsg(trans('alert/common.empty', trans('common.function.import.import_file')));
            }
        }
        return $this->msgs->getErrorMessages()->isEmpty();
    }
    public function confirmIndex(Request $req)
    {
        $this->msgs = new MessageManager();
        $confirmFormInput = $this->confirmFormInput($req);
        if ($confirmFormInput) {
            $this->msgs = new MessageManager();
            $data = $this->csvToArray($req->file('import_file'));
            $data = array_map_key(function ($index, $el) {
                $count = $index;
                $el['row'] = $count + 2;
                return $el;
            }, $data);

            session()->forget('data');
            session()->push('data', $data);
            return redirect(current_page() . '.import.result')->withInput(request()->all());
        } else {

            return redirect()->back()->with(['import_error' => $this->msgs->all()->toArray()]);
        }
    }
    public function confirmResult(Request $req)
    {
        $view_builder = new ViewBuilder();
        $data = session('data')[0];
        if ($this->validateImportData($data, null, $avaiableItems) == false) {
            $view_builder
                ->setVar('isError', true)
                ->setVar('errors',  $this->msgs->all()->toArray());
        } else {
            $view_builder->setVar('all_data', session('data')[0]);
        }
        $data = $this->applyPaginationByData(collect($data), $req);
        $avaiableItems = [];
       
        $view_builder
            ->setView('pages.static.import.confirm')
            ->setData($data)
            ->setModel($this->model)
            ->setLimitOptions($this->limit_options)
            ->setColumns($this->importColumns($req));
        return $view_builder();
    }


    public function import(Request $req)
    {
        $data = session('data')[0];

        $data = remove_attribute($data, 'row');
        try {
            foreach ($data as $d) {
                $this->model::create($d);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 401,
                'message' => $e->getMessage()
            ]);
        }
        session()->forget('data');
        return response()->json([
            'status' => 200,
        ]);
    }

    public function customImportLogic(Request $req)
    {
        return false;
    }
}
