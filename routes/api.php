<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/rezerwacje', 'App\Http\Controllers\ReservationController');

Route::resource('/zabiegi', 'App\Http\Controllers\ZabiegController');

Route::resource('/fryzjerzy', 'App\Http\Controllers\FryzjerController');

Route::resource('/cennik', 'App\Http\Controllers\CennikController');
