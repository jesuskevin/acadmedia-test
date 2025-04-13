<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Services\PaymentService;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    private PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->paymentService->index();
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        try {
            $enrollment = $this->paymentService->store($request);
            return response()->json($enrollment, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        try {
            return response()->json($payment->load(['enrollment.student', 'course']), Response::HTTP_OK);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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
        try {
            $this->paymentService->destroy($payment);
            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
