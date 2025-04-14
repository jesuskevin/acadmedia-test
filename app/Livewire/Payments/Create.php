<?php

namespace App\Livewire\Payments;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Enrollment;
use App\Models\Payment;
use App\Services\EnrollmentService;
use App\Services\PaymentService;
use Livewire\Component;

class Create extends Component
{
    private PaymentService $paymentService;
    private EnrollmentService $enrollmentService;

    public $course_id = '';
    public $enrollment_id = '';
    public $method = '';
    public $amount = '';
    public $courses = [];

    public function __construct()
    {
        $this->paymentService = new PaymentService(new Payment());
        $this->enrollmentService = new EnrollmentService(new Enrollment());
    }

    public function enrollmentChange()
    {
        $enrollment = Enrollment::with('courses')->find($this->enrollment_id);
        $this->courses = $enrollment?->courses ?? [];

    }

    public function save()
    {
        $validated = $this->validate((new StorePaymentRequest())->rules());
        $this->paymentService->store($validated);

        $this->reset(['course_id', 'enrollment_id', 'method', 'amount']);

        return redirect()->back()->with('success', 'Pago Registrado Correctamente.');
    }

    public function render()
    {
        $enrollments = $this->enrollmentService->index();

        return view('livewire.payments.create', [
            'enrollments' => $enrollments
        ]);
    }
}
