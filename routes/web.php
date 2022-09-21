<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('home/layout');
});

Route::resource('tipoprodutos', "App\Http\Controllers\TipoProdutoController", [
    'names' => [
        'index' => 'tipoprodutos',
        'create' => 'tipoproduto.create',
        'store' => 'tipoproduto.store',
        'show' => 'tipoproduto.show',
        'edit' => 'tipoproduto.edit'
    ]
]);

Route::resource('produtos', "App\Http\Controllers\ProdutoController", [
    'names' => [
        'index' => 'produto',
        'create' => 'produto.create',
        'store' => 'produto.store',
        'show' => 'produto.show',
        'edit' => 'produto.edit'
    ]
]);