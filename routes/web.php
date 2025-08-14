<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\TrabalheConoscoController;
use App\Http\Controllers\EnterpriseController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/planos-servicos', [PlanController::class, 'index'])->name('planos.servicos');
Route::get('/planos-empresas', [EnterpriseController::class, 'index'])->name('empresa.servicos');
Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');
Route::get('/trabalhe-conosco', [TrabalheConoscoController::class, 'create'])->name('trabalhe-conosco.create');
Route::post('/trabalhe-conosco', [TrabalheConoscoController::class, 'store'])->name('trabalhe-conosco.store');
