<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherApiResource;
use App\Models\Teacher;
use App\Services\ApiResponseBuilder;
use App\Services\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct(public TeacherService $service){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result=$this->service->getTeachers();
        return (new ApiResponseBuilder())->data(TeacherApiResource::collection($result->data))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
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
