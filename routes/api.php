<?php

use App\Http\Controllers\AssociateController;
use App\Http\Controllers\SonsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('associates', AssociateController::class);
Route::apiResource('sons', SonsController::class);

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('refresh',[AuthController::class,'refresh']);
    Route::post('register',[AuthController::class,'register']);
    Route::get('me',[AuthController::class,'me']);
});
