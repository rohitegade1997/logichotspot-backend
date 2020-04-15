<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category_model extends Model
{
    public function get_categories($category_limit)
    {
        try {
            $categories = DB::table('categories')
                ->select('id', 'title', 'active')
                ->paginate($category_limit);
            return $categories;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function search_category($search_keyword)
    {
        try {
            $categories = DB::table('categories')->select('title', 'active')
                ->where('title', 'LIKE', '%' . $search_keyword . '%')->get();
            return $categories;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //updating active column value based on id
    public function change_cat_status($cat_id, $request_data)
    {
        try {
            DB::table('categories')->where('id', $cat_id)->update($request_data);
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function delete_category($cat_id)
    {
        try {
            DB::table('categories')->where('id', $cat_id)->delete();
            return ['message' => 'Data deleted'];
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function get_category_by_id($cat_id)
    {
        try {
            $categories = DB::table('categories')->where('id', $cat_id)->get();
            return $categories;
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function edit_category($cat_id, $request_data)
    {
        try {
            DB::table('categories')->where('id', $cat_id)->update($request_data);
            return ['message' => 'Data updated successfully'];
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function add_new_category($request_data){
        try {
            $category = DB::table('categories')->insert([
                "title" => $request_data['category']
            ]);
            if ($category > 0) {
                return ["message" => "New category has been added"];
            } else {
                return ["message" => "Something went wrong"];
            }
        } catch (Exception $obj) {
            return ["message" => "Something went wrong"];
        }
    }
}
