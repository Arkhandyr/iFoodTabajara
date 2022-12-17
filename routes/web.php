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

Route::get('pedido/usuario', "App\Http\Controllers\PedidoUsuarioController@index")->name("pedidousuario.index");
Route::get("/pedido/usuario/getprodutos/{id}", "App\Http\Controllers\PedidoUsuarioController@getProdutos")->name("pedidousuario.getProdutos");

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/logout', 'App\Http\Controllers\Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function () {
    // Dashboard route
    Route::get('/', 'App\Http\Controllers\AdminController@index')->name('admin.dashboard');

    // Login routes
    Route::get('/login', 'App\Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.submit');

    // Logout route
    Route::post('/logout', 'App\Http\Controllers\Auth\AdminLoginController@logout')->name('admin.logout');

    // Register routes
    // Route::get('/register', 'App\Http\Controllers\Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    // Route::post('/register', 'App\Http\Controllers\Auth\AdminRegisterController@register')->name('admin.register.submit');

    // Password reset routes
    Route::get('/password/reset', 'App\Http\Controllers\Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'App\Http\Controllers\Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'App\Http\Controllers\Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'App\Http\Controllers\Auth\AdminResetPasswordController@reset')->name('admin.password.update');
});
