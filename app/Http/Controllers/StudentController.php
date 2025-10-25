<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Lesson;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function studentDashboard()
    {
        return view('students.dashboard');
    }
    public function studentProfile(){
        $student=Auth::guard('students')->user();
        $lessons=$student->lessons()->paginate(2);
        return view('students.profile',compact('lessons'));

    }

    public function studentLessonStore(Lesson $lesson)
    {
        $student=Auth::guard('students')->user();
        $student->lessons()->attach($lesson);
        return redirect()->route('student.profile');
    }

    public function studentField(Student $student)
    {
        $field=$student->field;
        return view('students.field',compact('field'));
    }
    public function index()
    {
        $students=Student::where('is_active',1)->paginate(2);
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields=Field::where('is_active',1)->where('type','student')->get();
        return view('students.create',compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student=Student::create($request->all());
        if ($student) {
            return redirect()->route('students.index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
