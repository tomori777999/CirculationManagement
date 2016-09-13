<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    // この中に認証が必要なルーティングを書く

    Route::resource('circulatemanagement',CirculationManagementController::class);
    Route::post('circulatemanagement/replace','CirculationManagementController@replace');
    // Route::resource('/update','CirculationManagementController@update');
});
