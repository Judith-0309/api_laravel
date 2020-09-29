<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateessaiRequest;
use App\Http\Requests\UpdateessaiRequest;
use App\Repositories\essaiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class essaiController extends AppBaseController
{
    /** @var  essaiRepository */
    private $essaiRepository;

    public function __construct(essaiRepository $essaiRepo)
    {
        $this->essaiRepository = $essaiRepo;
    }

    /**
     * Display a listing of the essai.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $essais = $this->essaiRepository->all();

        return view('essais.index')
            ->with('essais', $essais);
    }

    /**
     * Show the form for creating a new essai.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('essais.create');
    }

    /**
     * Store a newly created essai in storage.
     *
     * @param CreateessaiRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreateessaiRequest $request)
    {
        $input = $request->all();

        $essai = $this->essaiRepository->create($input);

        Flash::success('Essai saved successfully.');

        return redirect(route('essais.index'));
    }

    /**
     * Display the specified essai.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $essai = $this->essaiRepository->find($id);

        if (empty($essai)) {
            Flash::error('Essai not found');

            return redirect(route('essais.index'));
        }

        return view('essais.show')->with('essai', $essai);
    }

    /**
     * Show the form for editing the specified essai.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $essai = $this->essaiRepository->find($id);

        if (empty($essai)) {
            Flash::error('Essai not found');

            return redirect(route('essais.index'));
        }

        return view('essais.edit')->with('essai', $essai);
    }

    /**
     * Update the specified essai in storage.
     *
     * @param int $id
     * @param UpdateessaiRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdateessaiRequest $request)
    {
        $essai = $this->essaiRepository->find($id);

        if (empty($essai)) {
            Flash::error('Essai not found');

            return redirect(route('essais.index'));
        }

        $essai = $this->essaiRepository->update($request->all(), $id);

        Flash::success('Essai updated successfully.');

        return redirect(route('essais.index'));
    }

    /**
     * Remove the specified essai from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $essai = $this->essaiRepository->find($id);

        if (empty($essai)) {
            Flash::error('Essai not found');

            return redirect(route('essais.index'));
        }

        $this->essaiRepository->delete($id);

        Flash::success('Essai deleted successfully.');

        return redirect(route('essais.index'));
    }
}
