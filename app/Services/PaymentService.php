<?php

namespace App\Services;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use Illuminate\Support\Str;

class PaymentService
{
    private Payment $model;

    public function __construct(Payment $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->model->with(['enrollment.student', 'course'])->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest|array $request)
    {
        $data = $request;
        if ($request instanceof StoreCourseRequest) {
            $data = $request->validated();
        }
        $enrollment = $this->model::create($data);
        return $enrollment->load(['enrollment.student', 'course']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        return $payment->delete();
    }
}
