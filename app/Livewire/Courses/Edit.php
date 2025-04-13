<?php

namespace App\Livewire\Courses;

use App\Http\Requests\UpdateCourseRequest;
use App\Services\CourseService;
use Livewire\Component;
use App\Models\Course;

class Edit extends Component
{
    private CourseService $courseService;

    public $course;

    public $name;
    public $description;
    public $price;
    public $duration;

    public $confirmingDelete = false;

    public function __construct()
    {
        $this->courseService = new CourseService(new Course());
    }

    public function mount(Course $course)
    {
        $this->course = $course;

        $this->name = $course->name;
        $this->description = $course->description;
        $this->price = $course->price;
        $this->duration = $course->duration;
    }

    public function update()
    {
        $validated = $this->validate((new UpdateCourseRequest())->rules());
        $this->courseService->update($validated, $this->course);

        $this->reset(['name', 'description', 'price', 'duration']);

        return redirect()->back()->with('success', 'Curso Actualizado Correctamente.');
    }

    public function confirmDelete()
    {
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        $this->courseService->destroy($this->course);

        return redirect()->route('courses.index')->with('success', 'Curso eliminado correctamente.');
    }

    public function render()
    {
        return view('livewire.courses.edit');
    }
}