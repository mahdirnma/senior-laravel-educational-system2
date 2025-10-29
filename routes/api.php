<?php

use App\Http\Controllers\Api\AdminLoginController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\StudentLoginController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\TeacherLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::middleware('auth:api_admin')->as('api.')->group(function () {
    Route::apiResource('teachers', TeacherController::class)->only(['store']);
    Route::apiResource('students', StudentController::class)->only(['index','store']);
});
Route::middleware('auth:api_admin,api_teachers')->as('api.')->group(function () {
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('lessons', LessonController::class)->except('index');
    Route::apiResource('teachers', TeacherController::class)->only(['index']);
});
Route::middleware('auth:api_admin,api_teachers,api_students')->as('api.')->group(function () {
    Route::apiResource('lessons', LessonController::class)->only('index');
});
Route::middleware('auth:api_students')->as('api.')->group(function () {
    Route::get('/student/lessons', [LessonController::class, 'studentLessons']);
});
Route::post('/admin/login', AdminLoginController::class)->name('api.admin.login');
Route::post('/teachers/login', TeacherLoginController::class)->name('api.teachers.login');
Route::post('/students/login', StudentLoginController::class)->name('api.students.login');
