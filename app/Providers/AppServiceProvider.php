<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('manage-courses', function ($user,Course $course) {
            if ($user instanceof Teacher) {
                if ($course->teacher->id==$user->id){
                    return true;
                }
            }elseif ($user instanceof User) {
                return true;
            }
            return false;
        });
        Gate::define('manage-student-lessons', function ($user,Lesson $lesson) {
            if ($user instanceof Student) {
                if ($lesson->field_id==$user->field_id){
                    return true;
                }
                return false;
            }
            return true;
        });
        Gate::define('manage-teacher-lessons', function ($user,Lesson $lesson) {
            if ($user instanceof Teacher) {
                if ($lesson->field_id==$user->field_id){
                    return true;
                }
            }elseif ($user instanceof User) {
                return true;
            }
            return false;
        });
        Gate::define('manage-delete-lessons', function ($user,Lesson $lesson) {
            if ($user instanceof Teacher) {
                if ($lesson->field_id==$user->field_id && $lesson->teacher_id==$user->id){
                    return true;
                }
            }elseif ($user instanceof User) {
                return true;
            }
            return false;
        });
        Gate::define('isAdmin', function ($user) {
            if ($user instanceof User) {
                return true;
            }
            return false;
        });
        Gate::define('isTeacher', function ($user) {
            if ($user instanceof Teacher) {
                return true;
            }
            return false;
        });
    }
}
