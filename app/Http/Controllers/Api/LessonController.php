<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreLessonRequest;
use App\Http\Requests\Api\UpdateLessonRequest;
use App\Http\Resources\LessonApiResource;
use App\Models\Lesson;
use App\Services\ApiResponseBuilder;
use App\Services\LessonService;
use App\Services\TryService;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function __construct(public LessonService $service){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result=$this->service->getLessons();
        return (new ApiResponseBuilder())->data(LessonApiResource::collection($result->data))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        $result=$this->service->storeLesson($request);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message("Lesson created successfully."):
            (new ApiResponseBuilder())->message("Lesson not created successfully.");
        return $actionResult->data(new LessonApiResource($result->data))->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        $result=$this->service->showLesson($lesson);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message("Lesson retrieved successfully."):
            (new ApiResponseBuilder())->message("Lesson not found.");
        return $actionResult->data(new LessonApiResource($result->data))->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $result=$this->service->updateLesson($request, $lesson);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message("Lesson updated successfully."):
            (new ApiResponseBuilder())->message("Lesson not updated successfully.");
        return $actionResult->data(new LessonApiResource($result->data))->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $result=$this->service->destroyLesson($lesson);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message("Lesson deleted successfully."):
            (new ApiResponseBuilder())->message("Lesson not deleted successfully.");
        return $actionResult->response();
    }
}
