<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Area extends Model
{
    // function get_areas()
    // {
    //     $data = DB::table('areas')->get();
    //     return $data;
    // }

    //getting areas based on limit
    function get_areas($limit)
    {
        try {
            $areas = DB::table('areas')->select('id', 'title', 'active')->paginate($limit);
            return $areas;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    // public function add_area($request_data)
    // {
    //     // dd('add_area model called');
    //     //dd($request_data); 
    //     //DB::table('areas')->insert(["title"=>"pune"]);
    //     DB::table('areas')->insert($request_data);
    //     return ["message" => "Data added"];
    // }

    //get area based on id
    function get_area_by_id($area_id)
    {
        try {
            $areas = DB::table('areas')->where('id', $area_id)->get();
            return $areas;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //update area based on id
    public function edit_area($area_id, $request_data)
    {
        try {
            DB::table('areas')->where('id', $area_id)->update($request_data);
            return ['message' => 'Data updated successfully'];
        } catch (Exception $obj) {
            return $obj;
        }
    }

    // public function insert_area($request_data)
    // {
    //     DB::table('areas')->insert($request_data);
    //     return ['message' => 'Inserted'];
    // }

    //delete area based on id
    public function delete_area($area_id)
    {
        try {
            DB::table('areas')->where('id', $area_id)->delete();
            return ['message' => 'Data deleted'];
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //updating active column value based on id
    public function change_status($area_id, $request_data)
    {
        try {
            DB::table('areas')->where('id', $area_id)->update($request_data);
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //seraching area based on keyword
    public function search_area($search_keyword)
    {
        try {
            $areas = DB::table('areas')->select('title', 'active')
                ->where('title', 'LIKE', '%'.$search_keyword.'%')->get();
            return $areas;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //getting areas based on limit
    // public function get_limit_area($limit)
    // {
    //     $data = DB::table('areas')->select('id', 'title', 'active')
    //         ->paginate($limit);
    //     return $data;
    // }

    //getting all countries
    public function get_countries()
    {
        try {
            $countries = DB::table('countries')->select('id', 'country_name')->get();
            return $countries;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //getting states based on country id
    public function get_states_per_country($country_id)
    {
        try {
            $states = DB::table('states')->select('id', 'state_name')
                ->where('country_id', $country_id)->get();
            return $states;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //getting cities based on state id
    public function get_cities_per_state($state_id)
    {
        try {
            $cities = DB::table('cities')->select('id', 'city_name')
                ->where('state_id', $state_id)->get();
            return $cities;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //Inserting new area into areas table
    public function add_area($request_data)
    {
        try {
            $area = DB::table('areas')->insert([
                "title" => $request_data['areaName'], "active" => 1,
                "country_id" => $request_data['country'], "state_id" => $request_data['state'],
                "city_id" => $request_data['city']
            ]);
            if ($area > 0) {
                return ["message" => "New area has been added"];
            } else {
                return ["message" => "Something went wrong"];
            }
        } catch (Exception $obj) {
            return ["message" => "Something went wrong"];
        }
    }
}
