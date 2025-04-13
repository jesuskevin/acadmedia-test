<?php

namespace App\Livewire;

use App\Models\Course;
use App\Services\CourseService;
use Livewire\Component;

class Courses extends Component
{
    private CourseService $courseService;

    public function __construct()
    {
        $this->courseService = new CourseService(new Course());
    }

    public function render()
    {
        $courses = $this->courseService->index();

        return view('livewire.courses', [
            'courses' => $courses
        ]);
    }
}
