<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Area;
use Exception;
use Illuminate\Http\Response;

class Area_list extends Controller
{
    // function edit(Request $request){
    //     $title = $request->input('title');
    //     echo $title;
    //     $EditList = new EditList();
    //     $EditList->title = $title;
    //     $EditList->save();
    //     return $EditList;
    // }

    // function get_areas()
    // {
    //     $AreaModel = new Area();
    //     return response()->json($AreaModel->get_areas());
    // }

    //get limit areas
    function get_areas(Request $request)
    {
        try {
            $limit = $request->limit;
            $AreaModel = new Area();
            return response()->json($AreaModel->get_areas($limit));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    // public function add_area(Request $request)
    // {
    //     $AreaModel = new Area();
    //     // $AreaModel->title = $request->input('title');
    //     // $AreaModel->active = $request->input('active');
    //     // $AreaModel->save();
    //     // return response()->json($AreaModel);
    //     //$AreaModel->title = $request->input('areaName');
    //     //$AreaModel->add_area($request->all());
    //     // return response()->json($AreaModel->add_area());
    //     return response()->json($AreaModel->add_area($request->all()));
    // }

    //get area based on id
    function get_area_by_id(Request $request)
    {
        try {
            $area_id = $request->id;
            $AreaModel = new Area();
            return response()->json($AreaModel->get_area_by_id($area_id));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //update area
    public function edit_area(Request $request)
    {
        try {
            $area_id = $request->id;
            $AreaModel = new Area();
            return response()->json($AreaModel->edit_area($area_id, $request->all()));
        } catch (Exception $obj) {
            return $obj;
        }
    }


    // public function insert_area(Request $request)
    // {
    //     $AreaModel = new Area();
    //     //print_r($request->input());
    //     //$url_input = $request->input();
    //     $url_input = $request->all();
    //     return response()->json($AreaModel->insert_area($url_input));
    // }

    //delete area
    public function delete_area(Request $request)
    {
        try {
            $AreaModel = new Area();
            $area_id = $request->id;
            return response()->json($AreaModel->delete_area($area_id));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //update status
    public function change_status(Request $request)
    {
        try {
            $area_id = $request->id;
            $AreaModel = new Area();
            $AreaModel->change_status($area_id, $request->all());
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //search area
    public function search_area(Request $request)
    {
        try {
            $search_keyword = $request->keyword;
            $AreaModel = new Area();
            return response()->json($AreaModel->search_area($search_keyword));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    // public function get_limit_area(Request $request)
    // {
    //     $limit = $request->limit;
    //     $AreaModel = new Area();
    //     return response()->json($AreaModel->get_limit_area($limit));
    // }

    //get all countries
    public function get_countries()
    {
        try {
            $AreaModel = new Area();
            return response()->json($AreaModel->get_countries());
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //get states based on country
    public function get_states_per_country(Request $request)
    {
        try {
            $country_id = $request->id;
            $AreaModel = new Area();
            return response()->json($AreaModel->get_states_per_country($country_id));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //get cities based on states
    public function get_cities_per_state(Request $request)
    {
        try {
            $state_id = $request->id;
            $AreaModel = new Area();
            return response()->json($AreaModel->get_cities_per_state($state_id));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //add new area
    public function add_area(Request $request)
    {
        try {
            $AreaModel = new Area();
            return response()->json($AreaModel->add_area($request->all()));
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
