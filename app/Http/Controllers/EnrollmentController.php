<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Services\EnrollmentService;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class EnrollmentController extends Controller
{
    private EnrollmentService $enrollmentService;

    public function __construct(EnrollmentService $enrollmentService)
    {
        $this->enrollmentService = $enrollmentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->enrollmentService->index();
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollmentRequest $request)
    {
        try {
            $enrollment = $this->enrollmentService->store($request);
            return response()->json($enrollment, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        try {
            return response()->json($enrollment->load(['student', 'courses']), Response::HTTP_OK);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        try {
            $this->enrollmentService->destroy($enrollment);
            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
