<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/insert_area','Area_list@insert_area');

Route::post('/edit_area/{id}','Area_list@edit_area');

Route::get('/get_areas','Area_list@get_areas');

Route::get('/get_area_by_id/{id}','Area_list@get_area_by_id');

Route::post('/delete_area/{id}','Area_list@delete_area');

Route::post('/change_status/{id}','Area_list@change_status');

Route::post('/search_area/{keyword}','Area_list@search_area');

Route::post('/get_limit_area','Area_list@get_limit_area');

Route::post('/get_areas','Area_list@get_areas');

Route:: post('/get_blacklists', 'Blacklist@get_blacklists');

Route::get('/get_countries','Area_list@get_countries');

Route::get('/get_states_per_country/{id}','Area_list@get_states_per_country');

Route::get('/get_cities_per_state/{id}','Area_list@get_cities_per_state');

Route::post('/add_area','Area_list@add_area');

Route::get('/search_blacklisted_place/{keyword}','Blacklist@search_blacklisted_place');

Route::get('/get_places','Blacklist@get_places');

Route::post('/add_to_blacklist','Blacklist@add_to_blacklist');

Route::get('get_blacklisted_by_id/{id}','Blacklist@get_blacklisted_by_id');

Route::post('edit_mac/{id}','Blacklist@edit_mac');

Route::post('/delete_blacklisted/{id}','Blacklist@delete_blacklisted');

Route::post('/get_categories','Category@get_categories');

Route::get('search_category/{keyword}','Category@search_category');

Route::post('change_cat_status/{id}','Category@change_cat_status');

Route::post('delete_category/{id}','Category@delete_category');

Route::get('get_category_by_id/{id}','Category@get_category_by_id');

Route::post('edit_category/{id}','Category@edit_category');

Route::post('add_new_category','Category@add_new_category');

Route::post('get_nas','Nas@get_nas');

Route::get('get_nas_by_id/{id}','Nas@get_nas_by_id');

Route::post('edit_nas/{id}','Nas@edit_nas');

Route::post('add_new_nas','Nas@add_new_nas');

Route::post('delete_nas/{id}','Nas@delete_nas');

Route::post('get_businesses','Business2@get_businesses');

Route::get('/get_business_countries','Business2@get_countries');

Route::get('/get_business_states_per_country/{id}','Business2@get_states_per_country');

Route::get('/get_business_cities_per_state/{id}','Business2@get_cities_per_state');

Route::post('/add_new_business','Business2@add_new_business');

Route::get('/get_business_by_id/{id}','Business2@get_business_by_id');

Route::post('/edit_business/{id}','Business2@edit_business');

Route::post('/change_status/{id}','Business2@change_status');

Route::post('/delete_business/{id}','Business2@delete_business');

Route::post('/search_business/{keyword}','Business2@search_business');

Route::post('/get_countries','Country@get_countries');

Route::post('/change_country_status/{id}','Country@change_status');

Route::post('/search_country/{keyword}','Country@search_country');

Route::post('/get_states','State@get_states');

Route::post('/change_state_status/{id}','State@change_status');

Route::post('/search_state/{keyword}','State@search_state');

Route::post('/get_cities','City@get_cities');

Route::post('/search_city/{keyword}','City@search_city');

Route::post('/change_city_status/{id}','City@change_status');

Route::post('/get_demo1','Demo1@get_demo1');

Route::post('/search_name/{keyword}','Demo1@search_name');

Route::post('add_new_record','Demo1@add_new_record');