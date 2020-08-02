<?php

/*
|------------------------------------------------------------------------------------
| Api
|------------------------------------------------------------------------------------
*/

Route::group(['prefix' => 'v1','middleware' => []], function () {
    Route::post('auth','Api\ApiController@auth');
    Route::post('register','Api\RegisterController@register');
    
});
Route::group(['prefix' => 'v1', 'middleware' => ['auth.basic']], function () {
    Route::get('categories', 'Api\CategoriesController@index');
    Route::get('categories/{id}', 'Api\CategoriesController@show');
    Route::get('products', 'Api\ProductsController@index');
    Route::get('products/{id}', 'Api\ProductsController@show');
    Route::get('product/search{q?}', 'Api\ProductsController@search');
});