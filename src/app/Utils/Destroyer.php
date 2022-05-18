<?php

namespace App\Utils;

use Illuminate\Http\Request;
use Exception;

trait Destroyer
{
    public function delete(Request $req)
    {
        if ($req->get('delete_all')) {
            try {
                $this->model::where('deleted_at', null)->delete();
            } catch (Exception $e) {
                return response()->json([
                    'status' => 401,
                    'message' => $e->getMessage()
                ]);
            }
        } else {
            try {
                $this->model::destroy($req->get('ids') ?? []);
            } catch (Exception $e) {
                return response()->json([
                    'status' => 401,
                    'message' => $e->getMessage()
                ]);
            }
        }
        return response()->json([
            'status' => 200
        ]);
    }
}
