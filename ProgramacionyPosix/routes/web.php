<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register', [PostsController::class,"register"])->name("register");


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [PostsController::class, 'login']); // Ruta para procesar el inicio de sesión

Route::get('/error', function () {
    return view('error');
})->name('error');