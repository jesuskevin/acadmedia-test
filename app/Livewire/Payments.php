<?php

namespace App\Livewire;

use App\Models\Payment;
use App\Services\PaymentService;
use Livewire\Component;

class Payments extends Component
{

    private PaymentService $paymentService;

    public $payment_id;

    public $confirmingDelete = false;

    public function __construct()
    {
        $this->paymentService = new PaymentService(new Payment());
    }

    public function confirmDelete($payment_id)
    {
        $this->confirmingDelete = true;
        $this->payment_id = $payment_id;
    }

    public function delete()
    {
        $payment = Payment::where('id', $this->payment_id)->first();
        $this->paymentService->destroy($payment);

        return redirect()->route('payments.index')->with('success', 'Pago eliminado correctamente.');
    }

    public function render()
    {
        $payments = $this->paymentService->index();
        return view('livewire.payments', [
            'payments' => $payments,
        ]);
    }
}
