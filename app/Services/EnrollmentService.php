<?php

namespace App\Services;

use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Models\Enrollment;
use Illuminate\Support\Str;

class EnrollmentService
{
    private Enrollment $model;

    public function __construct(Enrollment $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->model->with(['student', 'courses'])->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollmentRequest|array $request)
    {
        $data = $request;
        if ($request instanceof StoreEnrollmentRequest) {
            $data = $request->validated();
        }
        $enrollment = $this->model::create([
            'enrollment_number' => Str::uuid(),
            ...$data,
        ]);
        $enrollment->courses()->sync($data['course_id']);

        return $enrollment->load(['courses', 'student']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentRequest|array $request, Enrollment $enrollment)
    {
        $data = $request;
        if ($request instanceof UpdateEnrollmentRequest) {
            $data = $request->validated();
        }
        return $enrollment->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        return $enrollment->delete();
    }
}
