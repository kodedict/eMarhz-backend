<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//===Admin Route

Route::get('/supplier','backend\admin\supplyController@index');

Route::view('/add-supplier','pages.admin.supplier.create');
Route::post('/add-supplier','backend\admin\supplyController@store');

Route::get('/edit-supplier/{id}','backend\admin\supplyController@edit')->name('editForm');
Route::post('/supplier/{id}','backend\admin\supplyController@update')->name('updateForm');

Route::get('/supplierDelete/{id}','backend\admin\supplyController@delete')->name('deleteSupply');

//===Admin Route