<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard.home');
})->middleware(['auth:admins', 'verified'])->name('dashboard');

Route::middleware('auth:admins')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth:admins']], function() {
    Route::resource('roles', \App\Http\Controllers\Admin\Roles\RoleController::class);
});

Route::controller(\App\Http\Controllers\Admin\Categories\CategoryController::class)->prefix('admin/category')->group(function () {
   Route::get('/', 'index')->name('categories.index');
   Route::get('/create', 'create')->name('category.create');
   Route::post('/store', 'store')->name('category.store');
   Route::get('edit/{id}', 'edit')->name('category.edit');
   Route::PUT('update/{id}', 'update')->name('category.update');
   Route::delete('delete/{id}', 'destroy')->name('category.destroy');
});
