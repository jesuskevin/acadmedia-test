<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Services\CourseService;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    private CourseService $courseServie;

    public function __construct(CourseService $courseServie)
    {
        $this->courseServie = $courseServie;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->courseServie->index();
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        try {
            $course = $this->courseServie->store($request);
            return response()->json($course, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        try {
            return response()->json($course, Response::HTTP_OK);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        try {
            $this->courseServie->update($request, $course);
            return response()->json($course, Response::HTTP_OK);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            $this->courseServie->destroy($course);
            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
