<?php

namespace App\Services;

use App\Models\Student;
use App\Models\Teacher;

class StudentService
{
    public function getStudent()
    {
        return app(TryService::class)(function (){
            return Student::where('is_active',1)->get();
        });
    }

    public function setStudent($request)
    {
        return app(TryService::class)(function () use ($request){
            return Student::create($request->all());
        });
    }

}
