<?php


Route::post('circulatemanagement/replace','CirculationManagementController@replace');

// Route::group(['middleware' => 'web'],function(){
// Route::group(['prefix' => '/'],function(){
  Route::resource('/', CirculationManagementController::class);
  Route::put('circulatelist/update','CirculationManagementController@update');
  Route::pUt('circulatelist/replace','CirculationManagementController@replace');

// });
// Route::group(['prefix' => '/admin'],function(){
//   Route::resource('', AdminController::class);
//   Route::get('home', 'AdminHomeController@index');
// });
// Route::group(['prefix' => '/admin'],function(){
    Route::group(['middleware' => 'guest:admin'], function () {
      Route::get('/admin/login','Auth\AdminAuthController@showLoginForm');
      Route::post('/admin/login','Auth\AdminAuthController@login');
    });
    Route::group(['middleware' => 'auth:admin'], function () {
      Route::get('/admin/home','AdminHomeController@index');
      Route::resource('/admin/index',AdminController::class);
    });
    Route::get('/admin/logout','Auth\AdminAuthController@logout');

    Route::auth();
    Route::get('/home', 'HomeController@index');
// });
// });
