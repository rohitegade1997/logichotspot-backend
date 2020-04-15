<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Business2_model;

class Business2 extends Controller
{
    //get businesses by limit
    public function get_businesses(Request $request)
    {
        try {
            $business_limit = $request->limit;
            $business_model = new Business2_model();
            return response()->json($business_model->get_businesses($business_limit));
        } catch (Exception $obj) {
            return response()->json($obj);
        }
    }

    //get all countries
    public function get_countries()
    {
        try {
            $business_model = new Business2_model();
            return response()->json($business_model->get_countries());
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //get states based on country
    public function get_states_per_country(Request $request)
    {
        try {
            $country_id = $request->id;
            $business_model = new Business2_model();
            return response()->json($business_model->get_states_per_country($country_id));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //get cities based on states
    public function get_cities_per_state(Request $request)
    {
        try {
            $state_id = $request->id;
            $business_model = new Business2_model();
            return response()->json($business_model->get_cities_per_state($state_id));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //add new business
    public function add_new_business(Request $request)
    {
        try {
            $business_model = new Business2_model();
            return response()->json($business_model->add_new_business($request->all()));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //get business based on id
    function get_business_by_id(Request $request)
    {
        try {
            $business_id = $request->id;
            $business_model = new Business2_model();
            return response()->json($business_model->get_business_by_id($business_id));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //update business
    public function edit_business(Request $request)
    {
        try {
            $business_id = $request->id;
            $business_model = new Business2_model();
            return response()->json($business_model->edit_business($business_id, $request->all()));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //update status
    public function change_status(Request $request)
    {
        try {
            $business_id = $request->id;
            $business_model = new Business2_model();
            $business_model->change_status($business_id, $request->all());
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //delete business
    public function delete_business(Request $request)
    {
        try {
            $business_model = new Business2_model();
            $business_id = $request->id;
            return response()->json($business_model->delete_business($business_id));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //search business
    public function search_business(Request $request)
    {
        try {
            $search_keyword = $request->keyword;
            $business_model = new Business2_model();
            return response()->json($business_model->search_business($search_keyword));
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
