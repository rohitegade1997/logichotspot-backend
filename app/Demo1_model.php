<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Demo1_model extends Model
{
    public function get_demo1($demo1_limit)
    {
        try {
            $demo1_records = DB::table('demo1')
                ->select('id', 'first_name', 'last_name','indian_phone')
                ->paginate($demo1_limit);
            return $demo1_records;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //seraching name based on keyword
    public function search_name($search_keyword)
    {
        try {
            $names = DB::table('demo1')->select('id', 'first_name', 'last_name','indian_phone')
                ->where('first_name', 'LIKE', '%' . $search_keyword . '%')->get();
            return $names;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //add new record
    public function add_new_record($request_data)
    {
        $system_date = date('Y-m-d H:i:s');
        try {
            $name = DB::table('demo1')->insert([
                "first_name" => $request_data['firstName'],
                "last_name" => $request_data['lastName'],
                "indian_phone" => $request_data['phone'],
                "created_date" => $system_date,
                "updated_date" => $system_date
            ]);
            if ($name > 0) {
                return ["message" => "New record has been added"];
            } else {
                return ["message" => "Something went wrong"];
            }
        } catch (Exception $obj) {
            return ["message" => "Something went wrong"];
        }
    }
}
