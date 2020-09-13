<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use PHPHtmlParser\Dom;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'LinkController@index');

Route::group(['prefix' => 'dashboard'], function () {

    Route::get('/links', 'LinkController@index');
    Route::get('/json', 'LinkController@json');
    Route::get('/links/new', 'LinkController@create');
    Route::post('/links/new', 'LinkController@store');
    Route::get('/links/{link}', 'LinkController@detail');
    Route::post('/links/{link}', 'LinkController@update');
    Route::delete('/links/{link}', 'LinkController@destroy');


    Route::get('/settings', 'UserController@edit');
    Route::post('/settings', 'UserController@update');

});
Route::get('/links/export', 'LinkController@export');


Route::get('/1', function () {
    dd(Hash::make('123'),Hash::make('123') );

});
