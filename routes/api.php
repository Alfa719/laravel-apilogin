<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group( function() {
    Route::get('user', [LoginController::class, 'user']);
    Route::post('logout', [LoginController::class, 'logout']);
});
