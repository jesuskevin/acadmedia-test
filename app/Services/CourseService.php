<?php

namespace App\Services;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseService
{
    private Course $model;

    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($perPage = null)
    {
        return $this->model->paginate($perPage ?? 5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest|array $request)
    {
        $data = $request;
        if ($request instanceof StoreCourseRequest) {
            $data = $request->validated();
        }
        return $this->model->create($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest|array $request, Course $course)
    {
        $data = $request;
        if ($request instanceof StoreCourseRequest) {
            $data = $request->validated();
        }
        return $course->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        return $course->delete();
    }
}
