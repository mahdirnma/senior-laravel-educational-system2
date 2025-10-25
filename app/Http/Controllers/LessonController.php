<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Field;
use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        if (Auth::guard('teachers')->check()) {
            $courses = Course::where('is_active',1)->get();
            return view('lessons.create',compact('courses'));
        }elseif (Auth::guard('admin')->check()) {
            $teachers = Teacher::where('is_active',1)->get();
            $courses = Course::where('is_active',1)->get();
            $fields = Field::where('is_active',1)->get();
            return view('lessons.create',compact('courses','teachers','fields'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        $teacher = Auth::guard('teachers')->user();
        $lesson=Lesson::create([
            ...$request->all(),
            'field_id'=>$teacher->id??$request->field_id,
//            'teacher_id'=>$teacher->id??$request->teacher_id
            'teacher_id'=>Auth::guard('teachers')->check()?$teacher->id:$request->teacher_id,
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
        if (Gate::allows('manage-teacher-lessons',$lesson)){
            if (Auth::guard('teachers')->check()) {
                $courses = Course::where('is_active',1)->get();
                return view('lessons.edit',compact('lesson','courses'));
            }elseif (Auth::guard('admin')->check()) {
                $teachers = Teacher::where('is_active',1)->get();
                $courses = Course::where('is_active',1)->get();
                $fields = Field::where('is_active',1)->get();
                return view('lessons.edit',compact('lesson','courses','teachers','fields'));
            }
        }
        return redirect()->route('lessons.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        if (Gate::allows('manage-teacher-lessons',$lesson)){
            $status=$lesson->update($request->all());
            if($status){
                return redirect()->route('lessons.index');
            }
            return redirect()->route('lessons.edit');
        }
        return redirect()->route('lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        if (Gate::allows('manage-delete-lessons',$lesson)){
            $lesson->update(['is_active'=>0]);
        }
        return redirect()->route('lessons.index');
    }
}
