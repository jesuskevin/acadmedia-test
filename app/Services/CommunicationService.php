<?php

namespace App\Services;

use App\Http\Requests\StoreCommunicationRequest;
use App\Http\Requests\UpdateCommunicationRequest;
use App\Mail\CommunicationMail;
use App\Models\Communication;
use Illuminate\Support\Facades\Mail;

class CommunicationService
{
    private Communication $model;

    public function __construct(Communication $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->model->with(['course'])->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommunicationRequest|array $request)
    {
        $data = $request;
        if ($request instanceof StoreCourseRequest) {
            $data = $request->validated();
        }
        $communication = $this->model::create($data)->load('course.enrollments.student.tutor.user');
        $tutors = [];
        foreach ($communication->course->enrollments as $key => $enrollment) {
            $tutors[$key] = $enrollment->student->tutor->user;
        }
        Mail::to($tutors)->send(new CommunicationMail($communication));
        return $communication;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommunicationRequest $request, Communication $communication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Communication $communication)
    {
        return $communication->delete();
    }
}
