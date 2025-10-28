<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
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
