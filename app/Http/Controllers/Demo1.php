<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demo1_model;
use Exception;

class Demo1 extends Controller
{
    public function get_demo1(Request $request)
    {
        try {
            $demo1_limit = $request->limit;
            $demo1_model = new Demo1_model();
            return response()->json($demo1_model->get_demo1($demo1_limit));
        } catch (Exception $obj) {
            return response()->json($obj);
        }
    }

    //search name
    public function search_name(Request $request)
    {
        try {
            $search_keyword = $request->keyword;
            $demo1_model = new Demo1_model();
            return response()->json($demo1_model->search_name($search_keyword));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //add new record
    public function add_new_record(Request $request)
    {
        try {
            $demo1_model = new Demo1_model();
            return response()->json($demo1_model->add_new_record($request->all()));
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
