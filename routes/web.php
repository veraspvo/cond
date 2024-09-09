<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\DivisaoController;
use App\Http\Controllers\SetorOrganizacaoMilitarController;
use App\Http\Controllers\DocumentoDivisaoController;
use App\Http\Controllers\ControleController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'redirectToKeycloak'])->name('login');
Route::get('callback', [LoginController::class, 'handleKeycloakCallback'])->name('callback');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


//Rotas Controles
Route::get('/controles/search', [ControleController::class, 'search'])->name('controles.search');
Route::get('/controles/consulta', [ControleController::class, 'consulta'])->name('controles.consulta');
Route::get('/controles', [ControleController::class, 'index'])->name('controles.index');
Route::post('/controles', [ControleController::class, 'store'])->name('controles.store');

//Rotas Documentos / Divisoes
Route::delete('/documentos_divisoes/{documento_divisao}/destroy', [DocumentoDivisaoController::class, 'destroy'])->name('documentos_divisoes.destroy');
Route::put('/documentos_divisoes/{documento_divisao}', [DocumentoDivisaoController::class, 'update'])->name('documentos_divisoes.update');
Route::get('/documentos_divisoes/{documento_divisao}/edit', [DocumentoDivisaoController::class, 'edit'])->name('documentos_divisoes.edit');
Route::post('/documentos_divisoes', [DocumentoDivisaoController::class, 'store'])->name('documentos_divisoes.store');
Route::get('/documentos_divisoes/create', [DocumentoDivisaoController::class, 'create'])->name('documentos_divisoes.create');
Route::get('/documentos_divisoes/{documento_divisao}', [DocumentoDivisaoController::class, 'show'])->name('documentos_divisoes.show');
Route::get('/documentos_divisoes', [DocumentoDivisaoController::class, 'index'])->name('documentos_divisoes.index');

//Rotas setorOrganizacaoMilitar
Route::post('/setores/select', [SetorOrganizacaoMilitarController::class, 'select'])->name('setores.select');

//Rotas divisoes
Route::delete('/divisoes/{divisao}/destroy', [DivisaoController::class, 'destroy'])->name('divisoes.destroy');
Route::put('/divisoes/{divisao}', [DivisaoController::class, 'update'])->name('divisoes.update');
Route::get('/divisoes/{divisao}/edit', [DivisaoController::class, 'edit'])->name('divisoes.edit');
Route::post('/divisoes', [DivisaoController::class, 'store'])->name('divisoes.store');
Route::get('/divisoes/create', [DivisaoController::class, 'create'])->name('divisoes.create');
Route::get('/divisoes/{divisao}', [DivisaoController::class, 'show'])->name('divisoes.show');
Route::get('/divisoes', [DivisaoController::class, 'index'])->name('divisoes.index');
Route::post('/divisoes/select', [DivisaoController::class, 'select'])->name('divisoes.select');

//Rotas documentos
Route::delete('/documentos/{documento}/destroy', [DocumentoController::class, 'destroy'])->name('documentos.destroy');
Route::put('/documentos/{documento}', [DocumentoController::class, 'update'])->name('documentos.update');
Route::get('/documentos/{documento}/edit', [DocumentoController::class, 'edit'])->name('documentos.edit');
Route::post('/documentos', [DocumentoController::class, 'store'])->name('documentos.store');
Route::get('/documentos/create', [DocumentoController::class, 'create'])->name('documentos.create');
Route::get('/documentos/{documento}', [DocumentoController::class, 'show'])->name('documentos.show');
Route::get('/documentos', [DocumentoController::class, 'index'])->name('documentos.index');


Route::get('/users', [UserController::class, 'index'])->name('users.index');



//Route::get('/', function () {
//    return view('welcome');
//});


