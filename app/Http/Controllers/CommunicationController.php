<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use App\Http\Requests\StoreCommunicationRequest;
use App\Http\Requests\UpdateCommunicationRequest;
use App\Services\CommunicationService;
use Symfony\Component\HttpFoundation\Response;

class CommunicationController extends Controller
{
    private CommunicationService $communicationService;

    public function __construct(CommunicationService $communicationService)
    {
        $this->communicationService = $communicationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->communicationService->index();
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommunicationRequest $request)
    {
        try {
            $communication = $this->communicationService->store($request);
            return response()->json($communication, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            logger($ex->getMessage());
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Communication $communication)
    {
        try {
            return response()->json($communication->load(['course']), Response::HTTP_OK);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong, please try again later or contact support if problem persist.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommunicationRequest $request, Communication $communication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Communication $communication)
    {
        //
    }
}
