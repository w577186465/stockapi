<?php

use Illuminate\Http\Request;

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

Route::get('/test', function () {
  echo 'sdfdsfsfdsf';
  return [1];
})->middleware('auth:api');

Route::group(['namespace' => 'Sharedata', 'middleware' => 'cors'], function(){
  Route::get('/report', 'Reports\IndexController@list');
	Route::get('/report/industry', 'Reports\IndustryController@list');
  Route::get('/report/{id}', 'Reports\IndexController@single');
	Route::get('/report/industry/{id}', 'Reports\IndustryController@single');
});

Route::group(['namespace' => 'Sharedata', 'middleware' => 'cors'], function(){
  // 个股报表
  Route::post('/report/add', 'Reports\IndexController@add');

  // 行业报表
  Route::post('/industry_report/add', 'Reports\IndustryController@add');
});
