<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::where('is_active',1)->paginate(2);
        return view('courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('teachers')->check()) {
            return view('courses.create');
        }elseif (Auth::guard('admin')->check()) {
            $teachers = Teacher::where('is_active',1)->get();
            return view('courses.create',compact('teachers'));
        }
/*        if (Gate::allows('isAdmin')) {
            $teachers = Teacher::where('is_active',1)->get();
            return view('courses.create',compact('teachers'));
        }elseif (Gate::allows('isTeacher')) {
            return view('courses.create');
        }*/
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $teacher=Auth::guard('teachers')->user();
        $course= Course::create([
            ...$request->all(),
            'teacher_id'=>$teacher->id??$request->teacher_id
        ]);
        if($course){
            return redirect()->route('courses.index');
        }
        return redirect()->route('courses.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        if (Auth::guard('teachers')->check()) {
            return view('courses.edit',compact('course'));
        }elseif (Auth::guard('admin')->check()) {
            $teachers = Teacher::where('is_active',1)->get();
            return view('courses.edit',compact('course','teachers'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $status = $course->update($request->all());
        if($status){
            return redirect()->route('courses.index');
        }
        return redirect()->route('courses.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->update(['is_active' => 0]);
        return redirect()->route('courses.index');
    }
}
