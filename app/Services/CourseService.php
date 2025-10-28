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

    public function addCourse($request)
    {
        return app(TryService::class)(function () use ($request){
            return Course::create($request->all());
        });
    }

    public function getCourse($course)
    {
        return app(TryService::class)(function () use ($course){
            return $course;
        });
    }

    public function updateCourse($request, $course)
    {
        return app(TryService::class)(function () use ($request, $course){
            $course->update($request->all());
            return $course;
        });
    }
    public function deleteCourse($course){
        return app(TryService::class)(function () use ($course){
            $course->update(['is_active'=>0]);
        });
    }
}
