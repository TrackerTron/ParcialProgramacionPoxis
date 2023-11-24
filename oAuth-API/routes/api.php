<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Passport\ClientRepository;

Route::prefix('v1')->group(function () {
    Route::post('/user', [UserController::class, "Register"]);
        Route::middleware(['auth:api'])->group(function () {
        Route::get('/validate', [UserController::class, "ValidateToken"]);
        Route::get('/logout', [UserController::class, "Logout"]);
        Route::post('/changepsw', [UserController::class, "changePassword"]);
    });
});


Route::get('/oauth/credentials', function () {
    $clientRepository = new ClientRepository;

    $client = $clientRepository->createPersonalAccessClient(
        null, 'Dynamic Client', url('/')
    );

    return response()->json([
        'client_id' => $client->id,
        'client_secret' => $client->secret,
    ]);
});
