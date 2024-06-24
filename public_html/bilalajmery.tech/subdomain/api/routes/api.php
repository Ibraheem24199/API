<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\forgotController;

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

Route::POST("/register",[registerController::class,"register"]);
Route::POST("/login",[loginController::class,"login"]);

Route::POST("/forgot",[forgotController::class,"forgot"]);
Route::POST("/verify",[forgotController::class,"verify"]);
Route::POST("/password",[forgotController::class,"password"]);
Route::POST("/resend",[forgotController::class,"resend"]);
