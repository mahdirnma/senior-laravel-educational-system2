<?php

use App\Http\Controllers\Api\AdminLoginController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LessonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::middleware('auth:api_admin')->as('api.')->group(function () {
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('lessons', LessonController::class);
});
Route::post('/admin/login', AdminLoginController::class)->name('api.admin.login');
