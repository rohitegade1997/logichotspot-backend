<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blacklist_model;
use Exception;

class Blacklist extends Controller
{
   public function __construct()
   {
   }

   public function get_blacklists(Request $request)
   {
      try {
         $limit = $request->limit;
         $blacklist = new Blacklist_model();
         return response()->json($blacklist->get_blacklists($limit));
      } catch (Exception $obj) {
         return response()->json($obj);
      }
   }

   public function search_blacklisted_place(Request $request)
   {
      try {
         $search_keyword = $request->keyword;
         $blacklist_model = new Blacklist_model();
         return response()->json($blacklist_model->search_blacklisted_place($search_keyword));
      } catch (Exception $obj) {
         return response()->json($obj);
      }
   }

   public function get_places()
   {
      try {
         $blacklist_model = new Blacklist_model();
         return response()->json($blacklist_model->get_places());
      } catch (Exception $obj) {
         return response()->json($obj);
      }
   }

   public function add_to_blacklist(Request $request)
   {
      try {
         $blacklist_model = new Blacklist_model();
         return response()->json($blacklist_model->add_to_blacklist($request->all()));
      } catch (Exception $obj) {
         return response()->json($obj);
      }
   }

   public function get_blacklisted_by_id(Request $request)
   {
      try {
         $blacklisted_id = $request->id;
         $blacklist_model = new Blacklist_model();
         return response()->json($blacklist_model->get_blacklisted_by_id($blacklisted_id));
      } catch (Exception $obj) {
         return response()->json($obj);
      }
   }

   //update Mac
   public function edit_mac(Request $request)
   {
      try {
         $blacklisted_id = $request->id;
         $blacklist_model = new Blacklist_model();
         return response()->json($blacklist_model->edit_mac($blacklisted_id, $request->all()));
      } catch (Exception $obj) {
         return response()->json($obj);
      }
   }

   public function delete_blacklisted(Request $request)
   {
      try {
         $blacklist_model = new Blacklist_model();
         $blacklisted_id = $request->id;
         return response()->json($blacklist_model->delete_blacklisted($blacklisted_id));
      } catch (Exception $obj) {
         return $obj;
      }
   }
}
