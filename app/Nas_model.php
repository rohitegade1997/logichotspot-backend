<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Nas_model extends Model
{
    public function get_nas($nas_limit)
    {
        try {
            $nas = DB::table('nas')
            ->select('id', 'nasname', 'shortname', 'type', 'ports', 
            'secret', 'server', 'community', 'description')
            ->paginate($nas_limit);
            return $nas;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function get_nas_by_id($nas_id){
        try {
            $nas = DB::table('nas')->where('id', $nas_id)->get();
            return $nas;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function edit_nas($nas_id,$request_data){
        try {
            DB::table('nas')->where('id', $nas_id)->update($request_data);
            return ['message' => 'Data updated successfully'];
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function add_new_nas($request_data){
        try {
            $category = DB::table('nas')->insert([
                "nasname" => $request_data['nasName'],
                "shortname"=> $request_data['shortName'],
                "type"=> $request_data['Type'],
                "ports"=> $request_data['Ports'],
                "secret"=> $request_data['Secret'],
                "server"=> $request_data['Server'],
                "community"=> $request_data['Community'],
                "description"=> $request_data['Description']
            ]);
            if ($category > 0) {
                return ["message" => "New NAS has been added"];
            } else {
                return ["message" => "Something went wrong"];
            }
        } catch (Exception $obj) {
            return ["message" => "Something went wrong"];
        }
    }

    public function delete_nas($nas_id){
        try {
            DB::table('nas')->where('id', $nas_id)->delete();
            return ['message' => 'Data deleted'];
        } catch (Exception $obj) {
            return $obj;
        }
    }
}
