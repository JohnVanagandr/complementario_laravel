<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index']);

Route::resource('users', UserController::class)->except(['show', 'create', 'store'])->names('users');

Route::prefix('users')->group(function () {
  Route::get("/{id}/posts", [UserController::class, "posts"])->name("users.posts");
});

Route::resource('posts', PostController::class)->except('show')->names('posts');

Route::resource('categories', CategoriesController::class)->except('show')->names('categories');

Route::resource('tags', TagController::class)->except('show')->names('tags');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('permissions', PermissionController::class)->except('show')->names('permissions');
Route::resource('roles', RoleController::class)->except('show')->names('roles');
