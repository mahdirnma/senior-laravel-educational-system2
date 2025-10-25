<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function teacherDashboard()
    {
        return view('teachers.dashboard');
    }

    public function teacherField(Teacher $teacher)
    {
        $field=$teacher->field;
        return view('teachers.field',compact('field'));
    }
    public function index()
    {
        $teachers = Teacher::where('is_active',1)->paginate(2);
        return view('teachers.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = Field::where('is_active',1)->get();
        return view('teachers.create',compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher=Teacher::create($request->all());
        if($teacher){
            return redirect()->route('teachers.index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
