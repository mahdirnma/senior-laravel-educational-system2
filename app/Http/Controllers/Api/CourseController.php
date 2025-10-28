<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreCourseRequest;
use App\Http\Requests\Api\UpdateCourseRequest;
use App\Http\Resources\CourseApiResource;
use App\Models\Course;
use App\Services\ApiResponseBuilder;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public CourseService $service){}

    public function index()
    {
        $result=$this->service->allCourses();
        return (new ApiResponseBuilder())->data(CourseApiResource::collection($result->data))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $result=$this->service->addCourse($request);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message("Course created successfully."):
            (new ApiResponseBuilder())->message("Unable to create Course.");
        return  $actionResult->data(new CourseApiResource($result->data))->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $result=$this->service->getCourse($course);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message("Course retrieved successfully."):
            (new ApiResponseBuilder())->message("Unable to retrieve course.");
        return  $actionResult->data(new CourseApiResource($result->data))->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $result=$this->service->updateCourse($request, $course);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message("Course updated successfully."):
            (new ApiResponseBuilder())->message("Unable to update course.");
        return  $actionResult->data(new CourseApiResource($course))->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
