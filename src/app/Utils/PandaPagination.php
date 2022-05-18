<?php
namespace App\Utils;

use Illuminate\Pagination\LengthAwarePaginator;

trait PandaPagination{
    public function applyPaginationByQuery($query,$req){
        $limit = $req->get('limit') ?? config('panda.limit');
        $count = count($query->get());
        $query->paginate($limit);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        return new LengthAwarePaginator($query->get(),$count,$limit,$currentPage,[
            'path' => $req->url(),
            'onEachSide' => 1
        ]);
    }
    public function applyPaginationByData($data,$req){
        $limit = $req->get('limit') ?? config('panda.limit');
        $count = count($data);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        return new LengthAwarePaginator($data->forPage($currentPage,$limit),$count,$limit,$currentPage,[
            'path' => $req->url(),
            'onEachSide' => 1
        ]);
    }
}