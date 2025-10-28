<?php

namespace App\Services;

use App\Models\Lesson;

class LessonService
{
    public function getLessons()
    {
        return app(TryService::class)(function (){
            return Lesson::where('is_active',1)->get();
        });

    }

    public function storeLesson($request)
    {
        return app(TryService::class)(function () use ($request){
            return Lesson::create($request->all());
        });
    }

    public function showLesson($lesson)
    {
        return app(TryService::class)(function () use ($lesson){
            return $lesson;
        });
    }
}
