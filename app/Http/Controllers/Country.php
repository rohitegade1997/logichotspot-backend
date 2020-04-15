<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Country_model;

class Country extends Controller
{
    //get countries by limit
    public function get_countries(Request $request)
    {
        try {
            $country_limit = $request->limit;
            $country_model = new Country_model();
            return response()->json($country_model->get_countries($country_limit));
        } catch (Exception $obj) {
            return response()->json($obj);
        }
    }

    //update status
    public function change_status(Request $request)
    {
        try {
            $country_id = $request->id;
            $country_model = new Country_model();
            $country_model->change_status($country_id, $request->all());
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //search country
    public function search_country(Request $request)
    {
        try {
            $search_keyword = $request->keyword;
            $country_model = new Country_model();
            return response()->json($country_model->search_country($search_keyword));
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
