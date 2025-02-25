<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(\App\Http\Controllers\API\Student\AuthController::class)->prefix('student')->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::controller(\App\Http\Controllers\API\Instrutor\InstructorAuthController::class)->prefix('instructor')->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::controller(\App\Http\Controllers\API\Student\CourseController::class)->middleware(['auth:sanctum'])->prefix('student/course')->group(function () {
    Route::get('/checkout/{id}', 'store');
});

Route::controller(\App\Http\Controllers\API\Student\CartController::class)->middleware(['auth:sanctum'])->prefix('student/cart')->group(function () {
    Route::get('/', 'index');
    Route::post('/add/{id}', 'store');
    Route::delete('/remove/{id}', 'destroy');
});

Route::controller(\App\Http\Controllers\API\Category\CategoryController::class)->prefix('category')->group(function () {
   Route::get('/', 'index');
});

Route::controller(\App\Http\Controllers\API\Instrutor\CourseController::class)->middleware(['auth:instructors'])->prefix('instructor/course')->group(function () {
    Route::post('/store', 'store');
});

Route::controller(\App\Http\Controllers\API\Courses\CourseController::class)->prefix('course')->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

Route::controller(\App\Http\Controllers\API\Event\EventController::class)->prefix('event')->group(function () {
   Route::get('/', 'index');
   Route::get('/show/{id}', 'show');
});
