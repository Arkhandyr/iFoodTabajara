<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('home/layout');
});

Route::resource('tipoprodutos', "App\Http\Controllers\TipoProdutoController", [
    'names' => [
        'index' => 'tipoproduto',
        'create' => 'tipoproduto.create',
        'store' => 'tipoproduto.store',
        'show' => 'tipoproduto.show',
        'edit' => 'tipoproduto.edit',
        'update' => 'tipoproduto.update',
        'destroy' => 'tipoproduto.destroy'
    ]
]);

Route::resource('produtos', "App\Http\Controllers\ProdutoController", [
    'names' => [
        'index' => 'produto',
        'create' => 'produto.create',
        'store' => 'produto.store',
        'show' => 'produto.show',
        'edit' => 'produto.edit',
        'update' => 'produto.update',
        'destroy' => 'produto.destroy'
    ]
]);

Route::resource('userinfos', "App\Http\Controllers\UserInfoController", [
    'names' => [
        'create' => 'userinfo.create',
        'store' => 'userinfo.store',
        'show' => 'userinfo.show',
        'edit' => 'userinfo.edit',
        'update' => 'userinfo.update',
        'destroy' => 'userinfo.destroy'
    ]
]);

Route::resource('enderecos', "App\Http\Controllers\EnderecoController", [
    'names' => [
        'index' => 'endereco',
        'create' => 'endereco.create',
        'store' => 'endereco.store',
        'show' => 'endereco.show',
        'edit' => 'endereco.edit',
        'update' => 'endereco.update',
        'destroy' => 'endereco.destroy'
    ]
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
