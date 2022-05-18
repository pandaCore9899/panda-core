<?php

namespace App\Http\Controllers\User;

use App\Data\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\Destroyer;
use App\Utils\ExcelManager;
use App\Utils\Importer;
use App\Utils\PandaPagination;
use App\Utils\ViewBuilder;

class UserController extends Controller
{
    use PandaPagination, Importer,Destroyer;

    protected $model = User::class;

    protected $limit_options = [4,10, 50, 100, 500];

    public function index(Request $req)
    {
        $query = $this->model::instance();

        $options = [
            [
                'icon' => 'info',
                'text' => 'Hello'
            ]
        ];
        $view_builder = new ViewBuilder();
        $data = $this->applyPaginationByQuery($query, $req);
        $view_builder
            ->setLimitOptions($this->limit_options)
            ->setColumns($this->displayColumns($req))
            ->setQuery($query)
            ->setModel($this->model)
            ->setData($data)
            ->setOptions($options);
        return $view_builder();
    }

    public function displayColumns(Request $req)
    {
        return [
            'id' => true,
            'name' => [
                'show' => true
            ],
            'email' => [
                'show' => true
            ],
            'role' => [
                'show' => true
            ]
        ];
    }
}
