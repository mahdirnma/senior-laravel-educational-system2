<?php

namespace App\Services;

use App\Models\Teacher;

class TeacherService
{
    public function getTeachers()
    {
        return app(TryService::class)(function (){
            return Teacher::where('is_active',1)->get();
        });
    }

    public function setTeacher($request)
    {
        return app(TryService::class)(function () use ($request){
            return Teacher::create($request->all());
        });
    }
}
