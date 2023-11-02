<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register', [PostsController::class,"register"])->name("register");

Route::post('/login', [PostsController::class,"login"])->name("login");
