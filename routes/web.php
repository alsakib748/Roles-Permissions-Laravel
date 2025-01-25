<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(PermissionController::class)->group(function(){

        Route::get('/permissions','index')->name('permissions.index');
        Route::get('/permissions/create','create')->name('permissions.create');
        Route::post('/permissions','store')->name('permissions.store');
        Route::get('/permissions/{id}/edit','edit')->name('permissions.edit');
        Route::post('/permissions/{id}','update')->name('permissions.update');
        Route::delete('/permissions','destroy')->name('permissions.destroy');

    });

    Route::controller(RoleController::class)->group(function(){

        Route::get('/roles','index')->name('roles.index');
        Route::get('/roles/create','create')->name('roles.create');
        Route::post('/roles','store')->name('roles.store');
        Route::get('/roles/{id}/edit','edit')->name('roles.edit');
        Route::post('/roles/{id}','update')->name('roles.update');
        Route::delete('/roles','destroy')->name('roles.destroy');

    });

    Route::controller(ArticleController::class)->group(function(){

        Route::get('/articles','index')->name(name: 'articles.index');
        Route::get('/articles/create','create')->name('articles.create');
        Route::post('/articles','store')->name('articles.store');
        Route::get('/articles/{id}/edit','edit')->name('articles.edit');
        Route::post('/articles/{id}','update')->name('articles.update');
        Route::delete('/articles','destroy')->name('articles.destroy');

    });

    Route::controller(UserController::class)->group(function(){

        Route::get('/users','index')->name(name: 'users.index');
        Route::get('/users/create','create')->name('users.create');
        Route::post('/users','store')->name('users.store');
        Route::get('/users/{id}/edit','edit')->name('users.edit');
        Route::post('/users/{id}','update')->name('users.update');
        Route::delete('/users','destroy')->name('users.destroy');

    });



});

require __DIR__.'/auth.php';
