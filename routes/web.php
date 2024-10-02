<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RetiradaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReceptorController;
use App\Http\Controllers\InteressadoController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/fim', [IndexController::class, 'fim']);
Route::get('/escolheId', [IndexController::class, 'escolheId']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout',[LoginController::class, 'logout']);

Route::get('/login/senhaunica', [LoginController::class, 'redirectToProvider']);
Route::get('/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/novoadmin',[UserController::class,'form']);
Route::post('/novoadmin',[UserController::class,'register']);

Route::get('/cadastranusp',[RetiradaController::class,'pede_nusp']);
Route::patch('/cadastranusp',[RetiradaController::class,'cadastra_interessado']);

Route::get('/login/semsenha',[RetiradaController::class,'sem_senha']);
Route::patch('/login/semsenha',[RetiradaController::class,'cadastra_assinatura']);

Route::get('/escolheDoc',[RetiradaController::class,'cria_proprio']);
Route::post('/escolheDoc',[RetiradaController::class,'cadastra_proprio']);

Route::get('/identificaSecretario',[RetiradaController::class,'identifica_secretario']);
Route::patch('/identificaSecretario',[RetiradaController::class,'cadastra_secretario']);

Route::get('/identificaInteressado',[InteressadoController::class,'create']);
Route::post('/identificaInteressado',[InteressadoController::class,'store']);

Route::get('/escolheDoc/terceiro',[RetiradaController::class,'cria_terceiro']);
Route::post('/escolheDoc/terceiro',[RetiradaController::class,'cadastra_terceiro']);

Route::get('/idTerceiro',[RetiradaController::class,'id_terceiro']);
Route::patch('/idTerceiro',[RetiradaController::class,'cadastra_id']);