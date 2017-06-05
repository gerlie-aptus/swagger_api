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

Route::get('/', function () {
    return view('welcome');
});


Route::get('testing', function () {
    return "testing";
});


Route::group(['prefixes'=>"api/v1",'middleware'=>["web",'cors']],function(){

	/*Documentation APIS*/
	Route::get("documentation","Documentation@main")->name("documentation");
	Route::get("page_two","Documentation@page_two")->name("page_two");
	/*END*/
	
	/*==============ISEEK API==============*/
	$data=array("001"=>"ping");

	/*Get all records of ping */
	Route::get($data['001'],"IseekApi@index");
	
	/*Get all records of accounts*/
	Route::get("accounts","IseekApi@accounts");
	
	/*Get service record by id*/
	Route::get("service/{service_id}","IseekApi@service");
	
	/*Get daily service record by id*/
	Route::get("service/{service_id}/start/{start_date}/end/{end_date}/usage","IseekApi@usage");

	/*Auth Log*/
	Route::get("service/{service_id}/start/{start_date}/end/{end_date}/authlog","IseekApi@usage");
	
	/*Get History*/
	Route::get("service/{service_id}/history",'IseekApi@history');	

	/*Delete service garden*/
	Route::delete("service/{service_id}/garden","IseekApi@service_garden");

	/*Delete Service Record*/
	Route::delete("service/{service_id}",'IseekApi@delete_service');	
	
	/*Add new record services*/
	Route::post("services","IseekApi@services");

	/*Update Service record Password*/
	Route::put("service/{service_id}/update",'IseekApi@update_service');	

	Route::put("service/{service_id}/garden/{garden}",'IseekApi@update_garden');	
});



 Route::post('register_user', 'APIController@register');
    Route::post('login', 'APIController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
    	Route::post('get_user_details', 'APIController@get_user_details');
    });