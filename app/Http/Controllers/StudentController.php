<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Services\StudentService;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{

    private StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->studentService->index();
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        try {
            $course = $this->studentService->store($request);
            return response()->json($course, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        try {
            return response()->json($student, Response::HTTP_OK);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {
            $this->studentService->update($request, $student);
            return response()->json($student, Response::HTTP_OK);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            $this->studentService->destroy($student);
            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
