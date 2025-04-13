<?php

namespace App\Livewire\Enrollments;

use App\Http\Requests\StoreEnrollmentRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use App\Services\EnrollmentService;
use Livewire\Component;

class Create extends Component
{
    private EnrollmentService $enrollmentService;

    public $student_id = '';
    public $course_id = '';

    public function __construct()
    {
        $this->enrollmentService = new EnrollmentService(new Enrollment());
    }

    public function save()
    {
        $validated = $this->validate((new StoreEnrollmentRequest())->rules());
        $this->enrollmentService->store($validated);

        $this->reset(['student_id', 'course_id']);

        return redirect()->back()->with('success', 'Estudiante Registrado en el Curso Correctamente.');
    }

    public function render()
    {
        $courses = Course::all();
        $students = Student::when(auth()->user()->hasRole('tutor'), function ($query) {
            return $query->where('tutor_id', auth()->user()->id);
        })->get();
        return view('livewire.enrollments.create', [
            'courses' => $courses,
            'students' => $students,
        ]);
    }
}
