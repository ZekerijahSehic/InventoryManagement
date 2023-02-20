<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix' => '/'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/login', [LoginController::class, 'create'])->middleware('guest');
    Route::post('/login', [LoginController::class, 'store']);
    Route::post('/logout', [LoginController::class, 'destroy']);
});

Route::group(['prefix' => '/products', 'middleware' => 'role'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/store', [ProductController::class, 'store']);
    Route::get('/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});
Route::get('/products/search', [ProductController::class, 'search']);

Route::group(['prefix' => '/users', 'middleware' => 'role'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::group(['prefix' => '/roles', 'middleware' => 'role'], function () {
    Route::get('/', [RoleController::class, 'index']);
    Route::get('/create', [RoleController::class, 'create']);
    Route::post('/store', [RoleController::class, 'store']);
    Route::get('/{id}/edit', [RoleController::class, 'edit']);
    Route::put('/{id}', [RoleController::class, 'update']);
    Route::delete('/{id}', [RoleController::class, 'destroy']);
});

Route::group(['prefix' => '/permissions', 'middleware' => 'role'], function () {
    Route::get('/', [PermissionController::class, 'index']);
    Route::get('/create', [PermissionController::class, 'create']);
    Route::post('/store', [PermissionController::class, 'store']);
    Route::get('/{id}/edit', [PermissionController::class, 'edit']);
    Route::put('/{id}', [PermissionController::class, 'update']);
    Route::delete('/{id}', [PermissionController::class, 'destroy']);
});





