<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State_model;
use Exception;

class State extends Controller
{
    //get states by limit
    public function get_states(Request $request)
    {
        try {
            $state_limit = $request->limit;
            $state_model = new State_model();
            return response()->json($state_model->get_states($state_limit));
        } catch (Exception $obj) {
            return response()->json($obj);
        }
    }

    //update status
    public function change_status(Request $request)
    {
        try {
            $state_id = $request->id;
            $state_model = new State_model();
            $state_model->change_status($state_id, $request->all());
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //search state
    public function search_state(Request $request)
    {
        try {
            $search_keyword = $request->keyword;
            $state_model = new State_model();
            return response()->json($state_model->search_state($search_keyword));
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
