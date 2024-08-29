<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AssinaturaController;

/*
|--------------------------------------------------------------------------
| Rotas de Autenticação
|--------------------------------------------------------------------------
|
| As rotas de autenticação são definidas automaticamente pelo Laravel UI.
|
*/

Auth::routes(); // Adiciona todas as rotas de autenticação

/*
|--------------------------------------------------------------------------
| Rotas Protegidas por Autenticação
|--------------------------------------------------------------------------
|
| As rotas dentro deste grupo requerem que o usuário esteja autenticado.
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::resource('clubes', ClubeController::class);

    // Rotas de assinaturas
    Route::get('assinaturas/create/{clube}', [AssinaturaController::class, 'create'])->name('assinaturas.create');
    Route::post('assinaturas/store/{clube}', [AssinaturaController::class, 'store'])->name('assinaturas.store');
    Route::get('assinaturas', [AssinaturaController::class, 'index'])->name('assinaturas.index');
    Route::get('assinaturas/{assinatura}', [AssinaturaController::class, 'show'])->name('assinaturas.show');
});

/*
|--------------------------------------------------------------------------
| Página Inicial
|--------------------------------------------------------------------------
|
| Página inicial para usuários não autenticados.
|
*/

Route::get('/', function () {
    return view('welcome'); // Página inicial para usuários não autenticados
});
