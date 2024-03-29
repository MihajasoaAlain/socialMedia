<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
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

Route::get('users',[UserController::class,'index']);
Route::get('users/{keyword}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{user_id}', [UserController::class, 'update']);
Route::delete('users/{user_id}', [UserController::class,'destroy']);



Route::get('posts',[UserController::class,'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

