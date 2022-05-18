<?php

namespace App\Utils;

use Exception;
use Illuminate\Http\Request;

use App\Utils\ExcelManager;

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

    public function confirmFormInput(Request $req)
    {
        // confirm form input
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
        // dump("confirm");
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
            return redirect()->route('account_management.confirm.result');
            // return $view_builder();
        } else {
            return redirect()->back()->with('import', $this->msgs->all()->toArray());
        }
    }
    public function confirmResult(Request $req)
    {
        $view_builder = new ViewBuilder();
        $data = session('data')[0];
        $data = $this->applyPaginationByData(collect($data), $req);

        $view_builder
            ->setView('pages.static.import.confirm')
            ->setData($data)
            ->setModel($this->model)
            ->setLimitOptions($this->limit_options)
            ->setColumns($this->importColumns($req));
        return $view_builder();
    }

    public function customImportLogic(Request $req)
    {
        return false;
    }
}
