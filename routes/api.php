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

Route::controller(\App\Http\Controllers\API\Instructor\InstructorAuthController::class)->prefix('instructor')->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
