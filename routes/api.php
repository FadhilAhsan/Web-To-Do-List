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

Route::get('/index', 'MainController@index');


Route::post('/task/create', 'TaskController@create');

Route::post('/task/edit', 'TaskController@edit');

Route::post('/task/update-status', 'TaskController@updateStatus');

Route::delete('/task/delete/{id}', 'TaskController@delete');

Route::delete('/task/delete-all', 'TaskController@deleteAll');