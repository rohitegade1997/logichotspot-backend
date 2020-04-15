<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blacklist_model extends Model
{
    public function get_blacklists($limit)
    {
        try {
            $data = DB::table('places as p')
                ->join('blacklists as b', 'b.place_id', '=', 'p.id')
                ->select('b.id', 'p.title', 'b.mac', 'b.attempt')
                ->paginate($limit);
            return $data;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function search_blacklisted_place($search_keyword)
    {
        try {
            $places = DB::table('blacklists as b')
                ->join('places as p', 'p.id', '=', 'b.place_id')
                ->select('p.title', 'b.mac', 'b.attempt')
                ->where('p.title', 'LIKE', '%' . $search_keyword . '%')->get();
            return $places;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function get_places()
    {
        try {
            $places = DB::table('places')
                ->select('id', 'title')
                ->get();
            return $places;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function add_to_blacklist($request_data)
    {
        $system_date = date('Y-m-d H:i:s');
        try {
            $place = DB::table('blacklists')->insert([
                "mac" => $request_data['macid'],
                "place_id" => $request_data['place'],
                "attempt" => $request_data['attempt'],
                "date" => $system_date
            ]);
            if ($place > 0) {
                return ["message" => "Place added to blacklist"];
            } else {
                return ["message" => "Something went wrong"];
            }
        } catch (Exception $obj) {
            return ["message" => "Something went wrong"];
        }
    }

    public function get_blacklisted_by_id($blacklist_id)
    {
        try {
            $blacklists = DB::table('blacklists')->where('id', $blacklist_id)->get();
            return $blacklists;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function edit_mac($id, $request_data)
    {
        try {
            DB::table('blacklists')->where('id', $id)->update($request_data);
            return ['message' => 'Data updated successfully'];
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function delete_blacklisted($blacklist_id)
    {
        try {
            DB::table('blacklists')->where('id', $blacklist_id)->delete();
            return ['message' => 'Data deleted'];
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
