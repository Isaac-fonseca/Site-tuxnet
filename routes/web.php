<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/planos-servicos', [PlanController::class, 'index'])->name('planos.servicos');