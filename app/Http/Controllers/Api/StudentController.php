<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\StudentApiResource;
use App\Models\Student;
use App\Services\ApiResponseBuilder;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(public StudentService $service){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result=$this->service->getStudent();
        return (new ApiResponseBuilder())->data(StudentApiResource::collection($result->data))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $result=$this->service->setStudent($request);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message("Student added successfully."):
            (new ApiResponseBuilder())->message("Something went wrong.");
        return $actionResult->data(new StudentApiResource($result->data))->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
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
