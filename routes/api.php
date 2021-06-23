<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AvailabletimeController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FeatureresortController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\ReviewController;

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
Route::apiResource('users', UserController::class);
Route::apiResource('availabletimes', AvailabletimeController::class);
Route::apiResource('features', FeatureController::class);
Route::apiResource('featureresorts', FeatureresortController::class);
Route::apiResource('rents', RentController::class);
Route::apiResource('reviews', ReviewController::class);


Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
