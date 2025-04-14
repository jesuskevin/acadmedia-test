<?php

namespace App\Livewire\Communications;

use App\Http\Requests\StoreCommunicationRequest;
use App\Models\Communication;
use App\Models\Course;
use App\Services\CommunicationService;
use Livewire\Component;

class Create extends Component
{
    private CommunicationService $communicationService;

    public $course_id = '';
    public $title = '';
    public $message = '';

    public function __construct()
    {
        $this->communicationService = new CommunicationService(new Communication());
    }

    public function save()
    {
        $validated = $this->validate((new StoreCommunicationRequest())->rules());
        $this->communicationService->store($validated);

        $this->reset(['course_id', 'title', 'message']);

        return redirect()->back()->with('success', 'Comunicado Enviado Correctamente.');
    }

    public function render()
    {
        $courses = Course::all();
        return view('livewire.communications.create', [
            'courses' => $courses
        ]);
    }
}
