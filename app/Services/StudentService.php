<?php

namespace App\Services;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentService
{
    private Student $model;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->model->with('tutor.user')
            ->when(auth()->user()->hasRole('tutor'), function ($query) {
                return $query->where('tutor_id', auth()->user()->tutor->id);
            })->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest|array $request)
    {
        $data = $request;
        if ($request instanceof StoreCourseRequest) {
            $data = $request->validated();
        }
        return $this->model->create($data)->load('tutor.user');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest|array $request, Student $student)
    {
        $data = $request;
        if ($request instanceof StoreCourseRequest) {
            $data = $request->validated();
        }
        return $student->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        return $student->delete();
    }
}
