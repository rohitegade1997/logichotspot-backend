<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class State_model extends Model
{
    //getting states by limit
    public function get_states($state_limit)
    {
        try {
            $states = DB::table('states')
                ->select('id', 'state_name', 'active')
                ->paginate($state_limit);
            return $states;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //updating active column value based on id
    public function change_status($state_id, $request_data)
    {
        try {
            DB::table('states')->where('id', $state_id)->update($request_data);
            DB::table('cities')->where('state_id', $state_id)->update($request_data);
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //seraching state based on keyword
    public function search_state($search_keyword)
    {
        try {
            $states = DB::table('states')->select('state_name', 'active')
                ->where('state_name', 'LIKE', '%'.$search_keyword.'%')->get();
            return $states;
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
