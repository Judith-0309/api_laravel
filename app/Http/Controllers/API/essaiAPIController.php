<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateessaiAPIRequest;
use App\Http\Requests\API\UpdateessaiAPIRequest;
use App\Models\essai;
use App\Repositories\essaiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class essaiController
 * @package App\Http\Controllers\API
 */

class essaiAPIController extends AppBaseController
{
    /** @var  essaiRepository */
    private $essaiRepository;

    public function __construct(essaiRepository $essaiRepo)
    {
        $this->essaiRepository = $essaiRepo;
    }

    /**
     * Display a listing of the essai.
     * GET|HEAD /essais
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $essais = $this->essaiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($essais->toArray(), 'Essais retrieved successfully');
    }

    /**
     * Store a newly created essai in storage.
     * POST /essais
     *
     * @param CreateessaiAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreateessaiAPIRequest $request)
    {
        $input = $request->all();

        $essai = $this->essaiRepository->create($input);

        return $this->sendResponse($essai->toArray(), 'Essai saved successfully');
    }

    /**
     * Display the specified essai.
     * GET|HEAD /essais/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var essai $essai */
        $essai = $this->essaiRepository->find($id);

        if (empty($essai)) {
            return $this->sendError('Essai not found');
        }

        return $this->sendResponse($essai->toArray(), 'Essai retrieved successfully');
    }

    /**
     * Update the specified essai in storage.
     * PUT/PATCH /essais/{id}
     *
     * @param int $id
     * @param UpdateessaiAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdateessaiAPIRequest $request)
    {
        $input = $request->all();

        /** @var essai $essai */
        $essai = $this->essaiRepository->find($id);

        if (empty($essai)) {
            return $this->sendError('Essai not found');
        }

        $essai = $this->essaiRepository->update($input, $id);

        return $this->sendResponse($essai->toArray(), 'essai updated successfully');
    }

    /**
     * Remove the specified essai from storage.
     * DELETE /essais/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var essai $essai */
        $essai = $this->essaiRepository->find($id);

        if (empty($essai)) {
            return $this->sendError('Essai not found');
        }

        $essai->delete();

        return $this->sendSuccess('Essai deleted successfully');
    }
}
