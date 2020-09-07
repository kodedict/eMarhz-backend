<?php


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



Route::get('/product','API\general\productController@getProduct');
Route::post('/login','API\general\userController@login');
Route::post('/register','API\general\userController@register');
//Route::post('/forget-PW','API\general\userController@forgetPW');

//Route::group(['middleware' => 'auth:api'], function(){



//===Seller Route

    Route::get('/sellerProfile/{id}','API\seller\userController@getProfile');

    Route::get('/sellerProduct','API\seller\productController@index');

    Route::get('/sellerSupply','API\seller\productController@formExtra');

    Route::post('/sellerProduct','API\seller\productController@store');
    Route::post('/sellerProduct/{id}','API\seller\productController@update');
    Route::post('/sellerProductDelete/{id}','API\seller\productController@delete');

    //===Seller Route

//===Customer Route

    Route::get('/customerProfile/{id}','API\customer\userController@getProfile');

    Route::get('/order/{id}','API\customer\orderController@order');
    Route::post('/placeOrder','API\customer\orderController@placeOrder');

    //===Customer Route
//});