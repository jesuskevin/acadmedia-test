<?php

namespace App\Livewire\Students;

use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\Tutor;
use App\Services\StudentService;
use Livewire\Component;

class Edit extends Component
{
    private StudentService $studentService;

    public Student $student;

    public $first_name = '';
    public $last_name = '';
    public $birthdate = '';
    public $tutor_id = '';

    public $confirmingDelete = false;

    public function __construct()
    {
        $this->studentService = new StudentService(new Student());
    }

    public function mount(Student $student)
    {
        $this->student = $student;

        $this->first_name = $student->first_name;
        $this->last_name = $student->last_name;
        $this->birthdate = $student->birthdate;
        $this->tutor_id = $student->tutor_id;
    }

    public function update()
    {
        $validated = $this->validate((new UpdateStudentRequest())->rules());
        $this->studentService->update($validated, $this->student);

        return redirect()->back()->with('success', 'Estudiante actualizado Correctamente.');
    }

    public function confirmDelete()
    {
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        $this->studentService->destroy($this->student);

        return redirect()->route('students.index')->with('success', value: 'Estudiante eliminado correctamente.');
    }

    public function render()
    {
        $tutors = Tutor::with('user')->get();
        return view('livewire.students.edit', [
            'tutors' => $tutors,
        ]);
    }
}
