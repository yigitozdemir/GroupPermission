<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->prefix('user')->group(function(){
    //Route::post('register', 'register');
    Route::post('login', 'login');
    Route::middleware('auth:sanctum')->post('profile', 'profile');
    Route::middleware('auth:sanctum')->post('edit', 'editPage');
    Route::middleware('auth:sanctum')->post('delete', 'deletePage');
    Route::middleware('auth:sanctum')->post('memberships', 'memberships');
});