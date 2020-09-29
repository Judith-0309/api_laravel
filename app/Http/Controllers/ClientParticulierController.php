<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientParticulierRequest;
use App\Http\Requests\UpdateClientParticulierRequest;
use App\Repositories\ClientParticulierRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class ClientParticulierController extends AppBaseController
{
    /** @var  ClientParticulierRepository */
    private $clientParticulierRepository;

    public function __construct(ClientParticulierRepository $clientParticulierRepo)
    {
        $this->clientParticulierRepository = $clientParticulierRepo;
    }

    /**
     * Display a listing of the ClientParticulier.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $clientParticuliers = $this->clientParticulierRepository->all();

        return view('client_particuliers.index')
            ->with('clientParticuliers', $clientParticuliers);
    }

    /**
     * Show the form for creating a new ClientParticulier.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('client_particuliers.create');
    }

    /**
     * Store a newly created ClientParticulier in storage.
     *
     * @param CreateClientParticulierRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreateClientParticulierRequest $request)
    {
        $input = $request->all();

        $clientParticulier = $this->clientParticulierRepository->create($input);

        Flash::success('Client Particulier saved successfully.');

        return redirect(route('clientParticuliers.index'));
    }

    /**
     * Display the specified ClientParticulier.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $clientParticulier = $this->clientParticulierRepository->find($id);

        if (empty($clientParticulier)) {
            Flash::error('Client Particulier not found');

            return redirect(route('clientParticuliers.index'));
        }

        return view('client_particuliers.show')->with('clientParticulier', $clientParticulier);
    }

    /**
     * Show the form for editing the specified ClientParticulier.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $clientParticulier = $this->clientParticulierRepository->find($id);

        if (empty($clientParticulier)) {
            Flash::error('Client Particulier not found');

            return redirect(route('clientParticuliers.index'));
        }

        return view('client_particuliers.edit')->with('clientParticulier', $clientParticulier);
    }

    /**
     * Update the specified ClientParticulier in storage.
     *
     * @param int $id
     * @param UpdateClientParticulierRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdateClientParticulierRequest $request)
    {
        $clientParticulier = $this->clientParticulierRepository->find($id);

        if (empty($clientParticulier)) {
            Flash::error('Client Particulier not found');

            return redirect(route('clientParticuliers.index'));
        }

        $clientParticulier = $this->clientParticulierRepository->update($request->all(), $id);

        Flash::success('Client Particulier updated successfully.');

        return redirect(route('clientParticuliers.index'));
    }

    /**
     * Remove the specified ClientParticulier from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $clientParticulier = $this->clientParticulierRepository->find($id);

        if (empty($clientParticulier)) {
            Flash::error('Client Particulier not found');

            return redirect(route('clientParticuliers.index'));
        }

        $this->clientParticulierRepository->delete($id);

        Flash::success('Client Particulier deleted successfully.');

        return redirect(route('clientParticuliers.index'));
    }
}
