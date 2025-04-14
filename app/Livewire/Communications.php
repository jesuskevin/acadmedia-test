<?php

namespace App\Livewire;

use App\Models\Communication;
use App\Services\CommunicationService;
use Livewire\Component;

class Communications extends Component
{
    private CommunicationService $communicationService;

    public $confirmingDelete = false;

    public $communication_id;

    public function __construct()
    {
        $this->communicationService = new CommunicationService(new Communication());
    }

    public function confirmDelete($communication_id)
    {
        $this->confirmingDelete = true;
        $this->communication_id = $communication_id;
    }

    public function delete()
    {
        $communication = Communication::where('id', $this->communication_id)->first();
        $this->communicationService->destroy($communication);

        return redirect()->route('communications.index')->with('success', 'Comunicado eliminada correctamente.');
    }

    public function render()
    {
        $communications = $this->communicationService->index();

        return view('livewire.communications', [
            'communications' => $communications,
        ]);
    }
}
