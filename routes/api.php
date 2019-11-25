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

header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods:  OPTIONS,DELETE,PUT');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

Route::group(['middleware' => ['cors','api']], function () {
	Route::apiResource('user', 'UserController');
});
