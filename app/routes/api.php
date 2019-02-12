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

// Route::resource('/players', 'PlayerController', [
//     'except' => ['edit', 'show', 'create']
//   ]);
//GET /api/v1/players?start=<num>&n=<num>

Route::prefix('v1')
  ->name('players.')
  ->group(function(){
    Route::get('players', 'PlayerController@index')->name('index');
    Route::post('players', 'PlayerController@store')->name('store');
});