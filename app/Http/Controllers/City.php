<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\City_model;

class City extends Controller
{
    //get cities by limit
    public function get_cities(Request $request)
    {
        try {
            $city_limit = $request->limit;
            $city_model = new City_model();
            return response()->json($city_model->get_cities($city_limit));
        } catch (Exception $obj) {
            return response()->json($obj);
        }
    }

    //search city
    public function search_city(Request $request)
    {
        try {
            $search_keyword = $request->keyword;
            $city_model = new City_model();
            return response()->json($city_model->search_city($search_keyword));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //update status
    public function change_status(Request $request)
    {
        try {
            $city_id = $request->id;
            $city_model = new City_model();
            $city_model->change_status($city_id, $request->all());
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
