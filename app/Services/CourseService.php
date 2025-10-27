<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    public function allCourses()
    {
        return app(TryService::class)(function (){
            return Course::where('is_active',1)->get();
        });
    }
}
