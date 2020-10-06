<?php

namespace App\Http\Controllers\API;

use Response;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\CompteRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateCompteAPIRequest;
use App\Http\Requests\API\UpdateCompteAPIRequest;

/**
 * Class CompteController
 * @package App\Http\Controllers\API
 */

class CompteAPIController extends AppBaseController
{
    /** @var  CompteRepository */
    private $compteRepository;

    public function __construct(CompteRepository $compteRepo)
    {
        $this->compteRepository = $compteRepo;
    }

    /**
     * Display a listing of the Compte.
     * GET|HEAD /comptes
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $comptes = $this->compteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($comptes->toArray(), 'Comptes retrieved successfully');
    }

    
    
    /**
     * Store a newly created Compte in storage.
     * POST /comptes
     *
     * @param CreateCompteAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreateCompteAPIRequest $request)
    {
        $input = $request->all();

        $compte = $this->compteRepository->create($input);

        return $this->sendResponse($compte->toArray(), 'Compte saved successfully');
    }

   /*
   
    /**
     * Display the specified Compte.
     * GET|HEAD /comptes/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     *
     * /
    public function show($id)
    {
        /** @var Compte $compte * /
        $compte = $this->compteRepository->find($id);

        if (empty($compte)) {
            return $this->sendError('Compte not found');
        }

        return $this->sendResponse($compte->toArray(), 'Compte retrieved successfully');
    }
    */


    /** 
     * Display the specified Comptes.
     * GET|HEAD /comptes/{numero_compte}
     *
     * @param string $numeroCompte
     *
     * @return Response
     */
    public function show($numeroCompte)
    {
        
        $result = DB::table('compte')->where('numero_compte', $numeroCompte)->first();

        if (empty($result)) {
            return $this->sendError('Comptes not  found');
        }

        return $this->sendResponse($result, 'Compte retrieved successfully');
    }




    /**
     * Update the specified Compte in storage.
     * PUT/PATCH /comptes/{id}
     *
     * @param int $id
     * @param UpdateCompteAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdateCompteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Compte $compte */
        $compte = $this->compteRepository->find($id);

        if (empty($compte)) {
            return $this->sendError('Compte not found');
        }

        $compte = $this->compteRepository->update($input, $id);

        return $this->sendResponse($compte->toArray(), 'Compte updated successfully');
    }

    /**
     * Remove the specified Compte from storage.
     * DELETE /comptes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var Compte $compte */
        $compte = $this->compteRepository->find($id);

        if (empty($compte)) {
            return $this->sendError('Compte not found');
        }

        $compte->delete();

        return $this->sendSuccess('Compte deleted successfully');
    }
}
