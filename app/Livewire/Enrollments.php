<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Enrollment;
use App\Services\CourseService;
use App\Services\EnrollmentService;
use Livewire\Component;

class Enrollments extends Component
{
    private EnrollmentService $enrollmentService;
    private CourseService $courseService;

    public $confirmingDelete = false;

    public $enrollment_id;

    public function __construct()
    {
        $this->enrollmentService = new EnrollmentService(new Enrollment());
        $this->courseService = new CourseService(new Course());
    }

    public function confirmDelete($enrollment_id)
    {
        $this->confirmingDelete = true;
        $this->enrollment_id = $enrollment_id;
    }

    public function delete()
    {
        $enrollment = Enrollment::where('id', $this->enrollment_id)->first();
        $this->enrollmentService->destroy($enrollment);

        return redirect()->route('enrollments.index')->with('success', 'Matricula eliminada correctamente.');
    }

    public function render()
    {
        $enrollments = $this->enrollmentService->index();
        $courses = $this->courseService->index();


        return view('livewire.enrollments', [
            'enrollments' => $enrollments,
            'courses' => $courses,
        ]);
    }
}
