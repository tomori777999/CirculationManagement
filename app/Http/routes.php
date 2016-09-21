<?php


Route::post('circulatemanagement/replace','CirculationManagementController@replace');


Route::group(['prefix' => '/'],function(){
  Route::resource('', CirculationManagementController::class);
});
Route::group(['middleware' => 'guest:admin'], function () {
  Route::get('/admin/login','Auth\AdminAuthController@showLoginForm');
  Route::post('/admin/login','Auth\AdminAuthController@login');
  Route::post('/admin/index','AdminController@index');
});
Route::group(['middleware' => 'auth:admin'], function () {
  Route::get('/admin/home','AdminHomeController@index');
  Route::post('/admin/index','AdminController@index');
});
Route::get('/admin/logout','AdminAuthController@logout');
Route::auth();
Route::get('/home', 'HomeController@index');
