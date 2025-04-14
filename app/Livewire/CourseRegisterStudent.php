<?php

namespace App\Livewire;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Tutor;
use App\Services\EnrollmentService;
use App\Services\StudentService;
use Livewire\Component;
use App\Models\Course;
use Livewire\Attributes\On;

class CourseRegisterStudent extends Component
{

    private StudentService $studentService;
    private EnrollmentService $enrollmentService;

    public $show = false;
    public $course;
    public $first_name;
    public $last_name;
    public $birthdate;
    public $tutor_id;

    public function __construct()
    {
        $this->studentService = new StudentService(new Student());
        $this->enrollmentService = new EnrollmentService(new Enrollment());
    }

    #[On('openRegisterModal')]
    public function openRegisterModal($courseId)
    {
        $this->course = Course::findOrFail($courseId);
        $this->show = true;
        $this->reset(['first_name', 'last_name', 'birthdate', 'tutor_id']);
    }

    public function register()
    {
        $validated = $this->validate((new StoreStudentRequest())->rules());
        $student = $this->studentService->store($validated);

        $this->enrollmentService->store([
            'course_id' => $this->course->id,
            'student_id' => $student->id,
        ]);

        $this->reset(['first_name', 'last_name', 'birthdate', 'tutor_id']);

        $this->show = false;

        return redirect()->back()->with('success', 'Estudiante Registrado Correctamente.');
    }

    public function render()
    {
        if(auth()->user()->hasRole('tutor')) {
            $tutors = Tutor::with('user')->where('user_id', auth()->user()->id)->get();
            $this->tutor_id = $tutors[0]->id;
        } else {
            $tutors = Tutor::with('user')->get();
        }
        return view('livewire.course-register-student', [
            'tutors' => $tutors
        ]);
    }
}