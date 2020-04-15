<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category_model;
use Exception;

class Category extends Controller
{
    public function get_categories(Request $request)
    {
        try {
            $category_limit = $request->limit;
            $category_model = new Category_model();
            return response()->json($category_model->get_categories($category_limit));
        } catch (Exception $obj) {
            return response()->json($obj);
        }
    }

    public function search_category(Request $request)
    {
        try {
            $search_keyword = $request->keyword;
            $category_model = new Category_model();
            return response()->json($category_model->search_category($search_keyword));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    //update category status
    public function change_cat_status(Request $request)
    {
        try {
            $cat_id = $request->id;
            $category_model = new Category_model();
            $category_model->change_cat_status($cat_id, $request->all());
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function delete_category(Request $request)
    {
        try {
            $category_model = new Category_model();
            $cat_id = $request->id;
            return response()->json($category_model->delete_category($cat_id));
        } catch (Exception $obj) {
            return $obj;
        }
    }

    public function get_category_by_id(Request $request)
    {
        try {
            $cat_id = $request->id;
            $category_model = new Category_model();
            return response()->json($category_model->get_category_by_id($cat_id));
        } catch (Exception $obj) {
            return response()->json($obj);
        }
    }

    //update category
   public function edit_category(Request $request)
   {
      try {
        $cat_id = $request->id;
         $category_model = new Category_model();
         return response()->json($category_model->edit_category($cat_id, $request->all()));
      } catch (Exception $obj) {
         return response()->json($obj);
      }
   }

   public function add_new_category(Request $request){
        try{
            $category_model = new Category_model();
            return response()->json($category_model->add_new_category($request->all()));
        }catch(Exception $obj){
            return $obj;
        }
   }
}
