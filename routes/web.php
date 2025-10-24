<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/student/login',[AuthController::class,'studentsLoginForm'])->name('student.login.form');
    Route::post('/student/login',[AuthController::class,'studentsLogin'])->name('student.login');
    Route::get('/teacher/login',[AuthController::class,'teachersLoginForm'])->name('teacher.login.form');
    Route::post('/teacher/login',[AuthController::class,'teachersLogin'])->name('teacher.login');
});
Route::middleware('auth:students')->group(function () {
    Route::get('/student/dashboard',[StudentController::class,'studentDashboard'])->name('student.dashboard');
    Route::post('/student/logout',[AuthController::class,'studentsLogout'])->name('student.logout');
});
Route::middleware('auth:teachers')->group(function () {
    Route::get('/teacher/dashboard',[TeacherController::class,'teacherDashboard'])->name('teacher.dashboard');
    Route::post('/teacher/logout',[AuthController::class,'teachersLogout'])->name('teacher.logout');
});
