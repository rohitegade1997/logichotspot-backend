<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Business2_model extends Model
{
    //getting businesses by limit
    public function get_businesses($business_limit)
    {
        try {
            $business = DB::table('businesses2')
                ->select('id', 'name', 'active')
                ->paginate($business_limit);
            return $business;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //getting all countries
    public function get_countries()
    {
        try {
            $countries = DB::table('countries')->select('id', 'country_name')
                ->where('active', 1)->get();
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
                ->where('country_id', $country_id)
                ->where('active', 1)->get();
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
                ->where('state_id', $state_id)
                ->where('active', 1)->get();
            return $cities;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //Inserting new business in businesses2 table
    public function add_new_business($request_data)
    {
        try {
            $business = DB::table('businesses2')->insert([
                "name" => $request_data['name'],
                "url" => $request_data['url'],
                "active" => 1,
                "address1" => $request_data['address1'],
                "address2" => $request_data['address2'],
                "phone" => $request_data['phone'],
                "country" => $request_data['country'],
                "state" => $request_data['state'],
                "city" => $request_data['city'],
                "zip" => $request_data['zip']
            ]);
            if ($business > 0) {
                return ["message" => "New business has been added"];
            } else {
                return ["message" => "Something went wrong"];
            }
        } catch (Exception $obj) {
            return ["message" => "Something went wrong"];
        }
    }

    //get business based on id
    function get_business_by_id($business_id)
    {
        try {
            $business = DB::table('businesses2')->where('id', $business_id)->get();
            return $business;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //update business based on id
    public function edit_business($business_id, $request_data)
    {
        try {
            DB::table('businesses2')->where('id', $business_id)->update([
                "name" => $request_data['name'],
                "url" => $request_data['url'],
                "active" => 1,
                "address1" => $request_data['address1'],
                "address2" => $request_data['address2'],
                "phone" => $request_data['phone'],
                "country" => $request_data['country'],
                "state" => $request_data['state'],
                "city" => $request_data['city'],
                "zip" => $request_data['zip']
            ]);
            return ['message' => 'Data updated successfully'];
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //updating active column value based on id
    public function change_status($business_id, $request_data)
    {
        try {
            DB::table('businesses2')->where('id', $business_id)->update($request_data);
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //delete business based on id
    public function delete_business($business_id)
    {
        try {
            DB::table('businesses2')->where('id', $business_id)->delete();
            return ['message' => 'Data deleted'];
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //seraching business based on keyword
    public function search_business($search_keyword)
    {
        try {
            $areas = DB::table('businesses2')->select('name', 'active')
                ->where('name', 'LIKE', '%' . $search_keyword . '%')->get();
            return $areas;
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
