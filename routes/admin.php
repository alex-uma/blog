<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/roles', RoleController::class)->except('show');

Route::resource('/permissions', PermissionController::class) ->except('show');

Route::resource('/users', UserController::class)->except('show');

Route::resource('/categories', CategoryController::class)->except('show');

Route::resource('/tags', TagController::class)->except('show');

Route::resource('/posts', PostController::class)->except('show');