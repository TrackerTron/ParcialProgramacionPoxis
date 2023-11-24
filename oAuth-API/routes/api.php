<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('v1')->group(function () {
    Route::post('/user', [UserController::class, "Register"]);
    
    // Las demás rutas protegidas solo deberían ser accesibles para usuarios autenticados
    Route::middleware(['auth:api'])->group(function () {
        Route::get('/validate', [UserController::class, "ValidateToken"]);
        Route::get('/logout', [UserController::class, "Logout"]);
        Route::post('/changepsw', [UserController::class, "changePassword"]);
    });
});
