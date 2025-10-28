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
    public function updateLesson($request, $lesson){
        return app(TryService::class)(function () use ($request, $lesson){
            $lesson->update($request->all());
            return $lesson;
        });
    }
    public function destroyLesson($lesson){
        return app(TryService::class)(function () use ($lesson){
            $lesson->update(['is_active' => 0]);
            return $lesson;
        });
    }
}
