<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaisesRequest;
use App\Http\Requests\UpdatePaisesRequest;
use App\Repositories\PaisesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PaisesController extends AppBaseController
{
    /** @var  PaisesRepository */
    private $paisesRepository;

    public function __construct(PaisesRepository $paisesRepo)
    {
        $this->paisesRepository = $paisesRepo;
    }

    /**
     * Display a listing of the Paises.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $paises = $this->paisesRepository->paginate(10);

        return view('paises.index')
            ->with('paises', $paises);
    }

    /**
     * Show the form for creating a new Paises.
     *
     * @return Response
     */
    public function create()
    {
        return view('paises.create');
    }

    /**
     * Store a newly created Paises in storage.
     *
     * @param CreatePaisesRequest $request
     *
     * @return Response
     */
    public function store(CreatePaisesRequest $request)
    {
        $input = $request->all();

        $paises = $this->paisesRepository->create($input);

        Flash::success('Paises saved successfully.');

        return redirect(route('paises.index'));
    }

    /**
     * Display the specified Paises.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            Flash::error('Paises not found');

            return redirect(route('paises.index'));
        }

        return view('paises.show')->with('paises', $paises);
    }

    /**
     * Show the form for editing the specified Paises.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            Flash::error('Paises not found');

            return redirect(route('paises.index'));
        }

        return view('paises.edit')->with('paises', $paises);
    }

    /**
     * Update the specified Paises in storage.
     *
     * @param int $id
     * @param UpdatePaisesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaisesRequest $request)
    {
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            Flash::error('Paises not found');

            return redirect(route('paises.index'));
        }

        $paises = $this->paisesRepository->update($request->all(), $id);

        Flash::success('Paises updated successfully.');

        return redirect(route('paises.index'));
    }

    /**
     * Remove the specified Paises from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            Flash::error('Paises not found');

            return redirect(route('paises.index'));
        }

        $this->paisesRepository->delete($id);

        Flash::success('Paises deleted successfully.');

        return redirect(route('paises.index'));
    }
}
