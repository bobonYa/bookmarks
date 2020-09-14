<?php

use Illuminate\Support\Facades\Route;


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


Route::get('search', function (\App\Links\LinksRepository $repository) {
    $links = $repository->search(strval(request('q')));

    return view('links.search', [
        'links' => $links,
    ]);
});
