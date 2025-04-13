<?php

namespace App\Livewire\Students;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use App\Models\Tutor;
use App\Services\StudentService;
use Livewire\Component;

class Create extends Component
{
    private StudentService $studentService;

    public $first_name = '';
    public $last_name = '';
    public $birthdate = '';
    public $tutor_id = '';

    public function __construct()
    {
        $this->studentService = new StudentService(new Student());
    }

    public function save()
    {
        $validated = $this->validate((new StoreStudentRequest())->rules());
        $this->studentService->store($validated);

        $this->reset(['first_name', 'last_name', 'birthdate', 'tutor_id']);

        return redirect()->back()->with('success', 'Estudiante Registrado Correctamente.');
    }

    public function render()
    {
        $tutors = Tutor::with('user')->get();
        return view('livewire.students.create', [
            'tutors' => $tutors
        ]);
    }
}
