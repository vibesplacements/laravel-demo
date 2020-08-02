<?php

/*
|------------------------------------------------------------------------------------
| Api
|------------------------------------------------------------------------------------
*/
//Route::group(['prefix' => 'v1', 'namespace' => 'Api', 'middleware' => ['api', 'ApiToken']], function(){
//    Route::get('categories', 'CategoriesController@index');
//    Route::get('categories/{id}', 'CategoriesController@show');
//});
//
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//Route::post('register', 'Api\RegisterController@register');
//Route::post('login', 'Api\LoginController@login');
//Route::post('logout', 'Api\LoginController@logout');

Route::group(['prefix' => 'v1','middleware' => []], function () {
    Route::post('auth','Api\ApiController@auth');
    
});
Route::group(['prefix' => 'v1', 'middleware' => ['auth.basic']], function () {
    Route::get('categories', 'Api\CategoriesController@index');
    Route::get('categories/{id}', 'Api\CategoriesController@show');
    
});