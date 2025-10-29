<?php

namespace App\Services;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if (Auth::guard('api_admin')->check()){
                return Lesson::create($request->all());
            }elseif (Auth::guard('api_teachers')->check()){
                return Lesson::create([
                    ...$request->all(),
                    'teacher_id' => Auth::guard('api_teachers')->id(),
                    'field_id' => Auth::guard('api_teachers')->user()->field_id,
                ]);
            }
            return response()->json(['error' => 'Unauthorized'], 401);
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

    public function studentLessons()
    {
        return app(TryService::class)(function (){
            $user = Auth::guard('api_students')->user();
            return $user->lessons;
        });
    }

    public function storeStudentLesson($request)
    {
        return app(TryService::class)(function () use ($request){
            if (Auth::guard('api_students')->check()){
                $user = Auth::guard('api_students')->user();
                $user->lessons()->attach($request->lesson_id);
            }
        });
    }
}
