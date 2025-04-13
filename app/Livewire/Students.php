<?php

namespace App\Livewire;

use App\Models\Student;
use App\Services\StudentService;
use Livewire\Component;

class Students extends Component
{
    private StudentService $studentService;

    public function __construct()
    {
        $this->studentService = new StudentService(new Student());
    }

    public function render()
    {
        $students = $this->studentService->index();

        return view('livewire.students', [
            'students' => $students
        ]);
    }
}
