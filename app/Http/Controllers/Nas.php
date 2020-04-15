<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nas_model;
use Exception;

class Nas extends Controller
{
    public function get_nas(Request $request)
    {
        try {
            $nas_limit = $request->limit;
            $nas_model = new Nas_model();
            return response()->json($nas_model->get_nas($nas_limit));
        } catch (Exception $obj) {
            return response()->json($obj);
        }
    }

    public function get_nas_by_id(Request $request)
    {
        try {
            $nas_id = $request->id;
            $nas_model = new Nas_model();
            return response()->json($nas_model->get_nas_by_id($nas_id));
        } catch (Exception $obj) {
            return response()->json($obj);
        }
    }

    public function edit_nas(Request $request)
    {
        try {
            $nas_id = $request->id;
            $nas_model = new Nas_model();
            return response()->json($nas_model->edit_nas($nas_id, $request->all()));
        } catch (Exception $obj) {
            return response()->json($obj);
        }
    }

    public function add_new_nas(Request $request)
    {
        try {
            $nas_model = new Nas_model();
            return response()->json($nas_model->add_new_nas($request->all()));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function delete_nas(Request $request){
        try {
            $nas_model = new Nas_model();
            $nas_id = $request->id;
            return response()->json($nas_model->delete_nas($nas_id));
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
