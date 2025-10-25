<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::redirect('/','/student/login');
Route::middleware('guest')->group(function () {
    Route::get('/student/login',[AuthController::class,'studentsLoginForm'])->name('student.login.form');
    Route::post('/student/login',[AuthController::class,'studentsLogin'])->name('student.login');
    Route::get('/teacher/login',[AuthController::class,'teachersLoginForm'])->name('teacher.login.form');
    Route::post('/teacher/login',[AuthController::class,'teachersLogin'])->name('teacher.login');
    Route::get('/admin/login',[AuthController::class,'adminLoginForm'])->name('admin.login.form');
    Route::post('/admin/login',[AuthController::class,'adminLogin'])->name('admin.login');
});
Route::middleware('auth:students,admin')->group(function () {
    Route::get('/student/dashboard',[StudentController::class,'studentDashboard'])->name('student.dashboard');
    Route::get('/student/profile',[StudentController::class,'studentProfile'])->name('student.profile');
    Route::post('/student/lessons/{lesson}/store',[StudentController::class,'studentLessonStore'])->name('student.lessons.store');
    Route::post('/student/logout',[AuthController::class,'studentsLogout'])->name('student.logout');
});
Route::middleware('auth:teachers,admin')->group(function () {
    Route::get('/teacher/dashboard',[TeacherController::class,'teacherDashboard'])->name('teacher.dashboard');
    Route::resource('courses',CourseController::class);
    Route::resource('lessons',LessonController::class)->except('index');
    Route::resource('teachers',TeacherController::class)->only('index');
    Route::get('/teacher/{teacher}/field',[TeacherController::class,'teacherField'])->name('teacher.field');
    Route::post('/teacher/logout',[AuthController::class,'teachersLogout'])->name('teacher.logout');
});
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard',[UserController::class,'adminDashboard'])->name('admin.dashboard');
    Route::resource('teachers',TeacherController::class)->only(['create','store']);
    Route::resource('students',StudentController::class)->only(['index','create','store']);
    Route::get('/student/{student}/field',[StudentController::class,'studentField'])->name('student.field');
    Route::post('/admin/logout',[AuthController::class,'adminLogout'])->name('admin.logout');
});
Route::middleware('auth:teachers,students')->group(function () {
    Route::resource('lessons',LessonController::class)->only(['index']);
});
