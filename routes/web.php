<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/get_areas','Area_list@get_areas');
Route::get('/add_area','Area_list@add_area');
Route::get('/get_area_per_id','Area_list@get_area_per_id');
Route::post('/edit_area{id}','Area_list@edit_area');

Route::post('edit', 'Area_list@edit');
Route::post('/','Area_list@insert_area');