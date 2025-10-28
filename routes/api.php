<?php

use App\Http\Controllers\Api\AdminLoginController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::middleware('auth:api_admin')->as('api.')->group(function () {
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('lessons', LessonController::class);
    Route::apiResource('teachers', TeacherController::class)->only(['index','store']);
    Route::apiResource('students', StudentController::class)->only(['index','store']);
});
Route::post('/admin/login', AdminLoginController::class)->name('api.admin.login');
