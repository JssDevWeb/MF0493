<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;

// Redirige la raíz a departamentos.index
Route::get('/', [App\Http\Controllers\DepartamentoController::class, 'index']);

// Rutas resource para departamentos y empleados
Route::resource('departamentos', DepartamentoController::class);
Route::resource('empleados', EmpleadoController::class);
