<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UsersController;
use App\Models\Song;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');


Route::prefix("admin")->name("admin.")->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard', []);
    })->middleware(['auth', 'verified', 'admin'])->name('dashboard');
    Route::middleware('admin')->group(function () {
        Route::prefix("users")->name("users.")->group(function () {
            Route::get('/', [UsersController::class, 'list'])->name('list');
            Route::delete('/delete/{id}', [UsersController::class, 'delete'])->name('delete');
            Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [UsersController::class, 'update'])->name('update');
            Route::post('/reset-password/{id}', [UsersController::class, 'reset_password'])->name('reset-password');
            Route::get('/create', [UsersController::class, 'create'])->name('create');
            Route::post('/create-handle', [UsersController::class, 'create_handle'])->name('create-handle');
        });
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
