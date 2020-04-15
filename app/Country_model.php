<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Country_model extends Model
{
    //getting countries by limit
    public function get_countries($country_limit)
    {
        try {
            $countries = DB::table('countries')
                ->select('id', 'country_name', 'active')
                ->paginate($country_limit);
            return $countries;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //updating active column value based on id
    public function change_status($country_id, $request_data)
    {
        try {
            DB::table('countries')->where('id', $country_id)->update($request_data);
            DB::table('states')->where('country_id', $country_id)->update($request_data);
            DB::table('cities')->where('country_id', $country_id)->update($request_data);
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //seraching country based on keyword
    public function search_country($search_keyword)
    {
        try {
            $countries = DB::table('countries')->select('country_name', 'active')
                ->where('country_name', 'LIKE', '%' . $search_keyword . '%')->get();
            return $countries;
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
