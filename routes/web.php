<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', HomeController::class)->name('home');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

Route::get('/user-count', [DashboardController::class, 'count']);

/* Route::post('images/upload', [ImageController::class, 'upload'])
    ->name('images.upload');

Route::get('prueba', function () {
    $files = Storage::files('images');
    $images = Image::pluck('path')->toArray();

    Storage::delete(array_diff($files, $images));
}); */

