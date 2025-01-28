<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.dashboard');

Route::controller(App\Http\Controllers\AdminController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'index')->name('admin_dashboard')->middleware('can:isAdmin');
    });
});
