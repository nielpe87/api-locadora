<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class,'auth']);

Route::middleware('auth:sanctum')->group(function(){

    Route::post("/logout", [AuthController::class, 'logout']);
    Route::apiResource("/filmes", FilmeController::class);
    Route::apiResource("/categorias", CategoriaController::class);
    Route::apiResource("users", UserController::class);
    Route::apiResource("clientes", ClienteController::class);
});

