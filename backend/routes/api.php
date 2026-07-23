<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjetoController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/projetos', [ProjetoController::class, 'index']);
    Route::post('/projetos', [ProjetoController::class, 'store']);
    Route::put('/projetos/{projeto}', [ProjetoController::class, 'update']);
    Route::delete('/projetos/{projeto}', [ProjetoController::class, 'destroy']);
});

