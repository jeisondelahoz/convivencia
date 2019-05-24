<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateObservacionesRequest;
use App\Http\Requests\UpdateObservacionesRequest;
use App\Repositories\ObservacionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ObservacionesController extends AppBaseController
{
    /** @var  ObservacionesRepository */
    private $observacionesRepository;

    public function __construct(ObservacionesRepository $observacionesRepo)
    {
        $this->observacionesRepository = $observacionesRepo;
    }

    /**
     * Display a listing of the Observaciones.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $observaciones = $this->observacionesRepository->paginate(10);

        return view('observaciones.index')
            ->with('observaciones', $observaciones);
    }

    /**
     * Show the form for creating a new Observaciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('observaciones.create');
    }

    /**
     * Store a newly created Observaciones in storage.
     *
     * @param CreateObservacionesRequest $request
     *
     * @return Response
     */
    public function store(CreateObservacionesRequest $request)
    {
        $input = $request->all();

        $observaciones = $this->observacionesRepository->create($input);

        Flash::success('Observaciones saved successfully.');

        return redirect(route('observaciones.index'));
    }

    /**
     * Display the specified Observaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $observaciones = $this->observacionesRepository->find($id);

        if (empty($observaciones)) {
            Flash::error('Observaciones not found');

            return redirect(route('observaciones.index'));
        }

        return view('observaciones.show')->with('observaciones', $observaciones);
    }

    /**
     * Show the form for editing the specified Observaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $observaciones = $this->observacionesRepository->find($id);

        if (empty($observaciones)) {
            Flash::error('Observaciones not found');

            return redirect(route('observaciones.index'));
        }

        return view('observaciones.edit')->with('observaciones', $observaciones);
    }

    /**
     * Update the specified Observaciones in storage.
     *
     * @param int $id
     * @param UpdateObservacionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateObservacionesRequest $request)
    {
        $observaciones = $this->observacionesRepository->find($id);

        if (empty($observaciones)) {
            Flash::error('Observaciones not found');

            return redirect(route('observaciones.index'));
        }

        $observaciones = $this->observacionesRepository->update($request->all(), $id);

        Flash::success('Observaciones updated successfully.');

        return redirect(route('observaciones.index'));
    }

    /**
     * Remove the specified Observaciones from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $observaciones = $this->observacionesRepository->find($id);

        if (empty($observaciones)) {
            Flash::error('Observaciones not found');

            return redirect(route('observaciones.index'));
        }

        $this->observacionesRepository->delete($id);

        Flash::success('Observaciones deleted successfully.');

        return redirect(route('observaciones.index'));
    }
}
