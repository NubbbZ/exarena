<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome');

Auth::routes();

Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/dashboard', 'index')->name('user_dashboard');
        Route::get('/settings', 'settings')->name('user_settings');
    });
});

Route::controller(App\Http\Controllers\AdminController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'index')->name('admin_dashboard')->middleware('can:isAdmin');
    });
});
