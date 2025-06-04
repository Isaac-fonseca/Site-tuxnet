<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SobreController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/planos-servicos', [PlanController::class, 'index'])->name('planos.servicos');
Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');