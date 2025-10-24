<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::where('is_active',1)->paginate(2);
        return view('lessons.index',compact('lessons'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::where('is_active',1)->get();
        return view('lessons.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        $teacher = Auth::guard('teachers')->user();
        $lesson=Lesson::create([
            ...$request->all(),
            'field_id'=>$teacher->field_id,
            'teacher_id'=>$teacher->id
        ]);
        if($lesson){
            return redirect()->route('lessons.index');
        }
        return redirect()->route('lessons.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
