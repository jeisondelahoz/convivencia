<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoObservacionesRequest;
use App\Http\Requests\UpdateTipoObservacionesRequest;
use App\Repositories\TipoObservacionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TipoObservacionesController extends AppBaseController
{
    /** @var  TipoObservacionesRepository */
    private $tipoObservacionesRepository;

    public function __construct(TipoObservacionesRepository $tipoObservacionesRepo)
    {
        $this->tipoObservacionesRepository = $tipoObservacionesRepo;
    }

    /**
     * Display a listing of the TipoObservaciones.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoObservaciones = $this->tipoObservacionesRepository->paginate(10);

        return view('tipo_observaciones.index')
            ->with('tipoObservaciones', $tipoObservaciones);
    }

    /**
     * Show the form for creating a new TipoObservaciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_observaciones.create');
    }

    /**
     * Store a newly created TipoObservaciones in storage.
     *
     * @param CreateTipoObservacionesRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoObservacionesRequest $request)
    {
        $input = $request->all();

        $tipoObservaciones = $this->tipoObservacionesRepository->create($input);

        Flash::success('Tipo Observaciones saved successfully.');

        return redirect(route('tipoObservaciones.index'));
    }

    /**
     * Display the specified TipoObservaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoObservaciones = $this->tipoObservacionesRepository->find($id);

        if (empty($tipoObservaciones)) {
            Flash::error('Tipo Observaciones not found');

            return redirect(route('tipoObservaciones.index'));
        }

        return view('tipo_observaciones.show')->with('tipoObservaciones', $tipoObservaciones);
    }

    /**
     * Show the form for editing the specified TipoObservaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoObservaciones = $this->tipoObservacionesRepository->find($id);

        if (empty($tipoObservaciones)) {
            Flash::error('Tipo Observaciones not found');

            return redirect(route('tipoObservaciones.index'));
        }

        return view('tipo_observaciones.edit')->with('tipoObservaciones', $tipoObservaciones);
    }

    /**
     * Update the specified TipoObservaciones in storage.
     *
     * @param int $id
     * @param UpdateTipoObservacionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoObservacionesRequest $request)
    {
        $tipoObservaciones = $this->tipoObservacionesRepository->find($id);

        if (empty($tipoObservaciones)) {
            Flash::error('Tipo Observaciones not found');

            return redirect(route('tipoObservaciones.index'));
        }

        $tipoObservaciones = $this->tipoObservacionesRepository->update($request->all(), $id);

        Flash::success('Tipo Observaciones updated successfully.');

        return redirect(route('tipoObservaciones.index'));
    }

    /**
     * Remove the specified TipoObservaciones from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoObservaciones = $this->tipoObservacionesRepository->find($id);

        if (empty($tipoObservaciones)) {
            Flash::error('Tipo Observaciones not found');

            return redirect(route('tipoObservaciones.index'));
        }

        $this->tipoObservacionesRepository->delete($id);

        Flash::success('Tipo Observaciones deleted successfully.');

        return redirect(route('tipoObservaciones.index'));
    }
}
