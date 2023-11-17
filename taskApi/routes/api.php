<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');        // Mostrar todas las tareas
    Route::get('/show/{task}', [TaskController::class, 'show'])->name('tasks.show'); // Mostrar una tarea por ID
    Route::post('/create', [TaskController::class, 'store'])->name('tasks.store');   // Crear una nueva tarea
    Route::put('/update/{task}', [TaskController::class, 'update'])->name('tasks.update'); // Actualizar una tarea
    Route::delete('/delete/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Eliminar una tarea
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
