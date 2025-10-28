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
}
