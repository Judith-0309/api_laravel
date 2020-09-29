<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientParticulierAPIRequest;
use App\Http\Requests\API\UpdateClientParticulierAPIRequest;
use App\Models\ClientParticulier;
use App\Repositories\ClientParticulierRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClientParticulierController
 * @package App\Http\Controllers\API
 */

class ClientParticulierAPIController extends AppBaseController
{
    /** @var  ClientParticulierRepository */
    private $clientParticulierRepository;

    public function __construct(ClientParticulierRepository $clientParticulierRepo)
    {
        $this->clientParticulierRepository = $clientParticulierRepo;
    }

    /**
     * Display a listing of the ClientParticulier.
     * GET|HEAD /clientParticuliers
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $clientParticuliers = $this->clientParticulierRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientParticuliers->toArray(), 'Client Particuliers retrieved successfully');
    }

    /**
     * Store a newly created ClientParticulier in storage.
     * POST /clientParticuliers
     *
     * @param CreateClientParticulierAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreateClientParticulierAPIRequest $request)
    {
        $input = $request->all();

        $clientParticulier = $this->clientParticulierRepository->create($input);

        return $this->sendResponse($clientParticulier->toArray(), 'Client Particulier saved successfully');
    }

    /**
     * Display the specified ClientParticulier.
     * GET|HEAD /clientParticuliers/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var ClientParticulier $clientParticulier */
        $clientParticulier = $this->clientParticulierRepository->find($id);

        if (empty($clientParticulier)) {
            return $this->sendError('Client Particulier not found');
        }

        return $this->sendResponse($clientParticulier->toArray(), 'Client Particulier retrieved successfully');
    }

    /**
     * Update the specified ClientParticulier in storage.
     * PUT/PATCH /clientParticuliers/{id}
     *
     * @param int $id
     * @param UpdateClientParticulierAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdateClientParticulierAPIRequest $request)
    {
        $input = $request->all();

        /** @var ClientParticulier $clientParticulier */
        $clientParticulier = $this->clientParticulierRepository->find($id);

        if (empty($clientParticulier)) {
            return $this->sendError('Client Particulier not found');
        }

        $clientParticulier = $this->clientParticulierRepository->update($input, $id);

        return $this->sendResponse($clientParticulier->toArray(), 'ClientParticulier updated successfully');
    }

    /**
     * Remove the specified ClientParticulier from storage.
     * DELETE /clientParticuliers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var ClientParticulier $clientParticulier */
        $clientParticulier = $this->clientParticulierRepository->find($id);

        if (empty($clientParticulier)) {
            return $this->sendError('Client Particulier not found');
        }

        $clientParticulier->delete();

        return $this->sendSuccess('Client Particulier deleted successfully');
    }
}
