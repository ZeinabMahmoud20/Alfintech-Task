<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TokenController;
use App\Http\Controllers\StoreController;

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

//add token 
Route::post('auth/addToken', [TokenController::class, 'store']);

//register user
// Route::post('user/register', [RegisterController::class, 'register']);

Route::controller(RegisterController::class)->group(function(){
    Route::post('user/register', 'register');
    Route::post('user/login', 'login');
});

//srore a store
Route::post('store/add', [StoreController::class, 'store']);

