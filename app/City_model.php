<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class City_model extends Model
{
    //getting cities by limit
    public function get_cities($city_limit)
    {
        try {
            $states = DB::table('cities')
                ->select('id', 'city_name', 'active')
                ->paginate($city_limit);
            return $states;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //seraching city based on keyword
    public function search_city($search_keyword)
    {
        try {
            $city = DB::table('cities')->select('city_name', 'active')
                ->where('city_name', 'LIKE', '%'.$search_keyword.'%')->get();
            return $city;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //updating active column value based on id
    public function change_status($city_id, $request_data)
    {
        try {
            DB::table('cities')->where('id', $city_id)->update($request_data);
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
