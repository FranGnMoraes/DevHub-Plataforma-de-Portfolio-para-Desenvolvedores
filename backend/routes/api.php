<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\TecnologiaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/projetos', [ProjetoController::class, 'index']);
    Route::post('/projetos', [ProjetoController::class, 'store']);
    Route::put('/projetos/{projeto}', [ProjetoController::class, 'update']);
    Route::delete('/projetos/{projeto}', [ProjetoController::class, 'destroy']);
    Route::get('/tecnologias', [TecnologiaController::class, 'index']);
    Route::post('/tecnologias', [TecnologiaController::class, 'store']);
    Route::put('/tecnologias/{tecnologia}', [TecnologiaController::class, 'update']);
    Route::delete('/tecnologias/{tecnologia}', [TecnologiaController::class, 'destroy']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

