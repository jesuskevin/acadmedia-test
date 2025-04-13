<?php

namespace App\Livewire\Courses;

use App\Http\Requests\StoreCourseRequest;
use App\Services\CourseService;
use Livewire\Component;
use App\Models\Course;
use Illuminate\Validation\Rule;

class Create extends Component
{
    private CourseService $courseService;

    public $name = '';
    public $description = '';
    public $price = '';
    public $duration = '';

    public function __construct()
    {
        $this->courseService = new CourseService(new Course());
    }

    public function save()
    {
        $validated = $this->validate((new StoreCourseRequest())->rules());
        $this->courseService->store($validated);

        $this->reset(['name', 'description', 'price', 'duration']);

        return redirect()->back()->with('success', 'Curso Creado Correctamente.');
    }

    public function render()
    {
        return view('livewire.courses.create');
    }
}