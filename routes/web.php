<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RetiradaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/fim', [IndexController::class, 'fim']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout',[LoginCOntroller::class, 'logout']);

Route::get('/login/senhaunica', [LoginController::class, 'redirectToProvider']);
Route::get('/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/novoadmin',[UserController::class,'form']);
Route::post('/novoadmin',[UserController::class,'register']);

Route::resource('retiradas',RetiradaController::class);

Route::get('/retiradas/identificaSecretario/{id}',[RetiradaController::class,'identifica_secretario']);
Route::patch('/retiradas/identificaSecretario/{id}',[RetiradaController::class,'cadastra_secretario']);