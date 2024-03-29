<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

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

Route::post('transactions', [PostController::class, 'getTransactionsByRib']);

Route::controller(AuthController::class)
    ->prefix("auth")
    ->group(function () {
        Route::post("login", "login");
        Route::post("logout", "logout");
        Route::post("register", "register");
    });

Route::get("dashboard", [AuthController::class, "dashboard"])
    ->middleware('auth');
