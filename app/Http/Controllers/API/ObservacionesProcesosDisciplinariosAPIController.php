<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateObservacionesProcesosDisciplinariosAPIRequest;
use App\Http\Requests\API\UpdateObservacionesProcesosDisciplinariosAPIRequest;
use App\Models\ObservacionesProcesosDisciplinarios;
use App\Repositories\ObservacionesProcesosDisciplinariosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ObservacionesProcesosDisciplinariosController
 * @package App\Http\Controllers\API
 */

class ObservacionesProcesosDisciplinariosAPIController extends AppBaseController
{
    /** @var  ObservacionesProcesosDisciplinariosRepository */
    private $observacionesProcesosDisciplinariosRepository;

    public function __construct(ObservacionesProcesosDisciplinariosRepository $observacionesProcesosDisciplinariosRepo)
    {
        $this->observacionesProcesosDisciplinariosRepository = $observacionesProcesosDisciplinariosRepo;
    }

    /**
     * Display a listing of the ObservacionesProcesosDisciplinarios.
     * GET|HEAD /observacionesProcesosDisciplinarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($observacionesProcesosDisciplinarios->toArray(), 'Observaciones Procesos Disciplinarios retrieved successfully');
    }

    /**
     * Store a newly created ObservacionesProcesosDisciplinarios in storage.
     * POST /observacionesProcesosDisciplinarios
     *
     * @param CreateObservacionesProcesosDisciplinariosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateObservacionesProcesosDisciplinariosAPIRequest $request)
    {
        $input = $request->all();

        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->create($input);

        return $this->sendResponse($observacionesProcesosDisciplinarios->toArray(), 'Observaciones Procesos Disciplinarios saved successfully');
    }

    /**
     * Display the specified ObservacionesProcesosDisciplinarios.
     * GET|HEAD /observacionesProcesosDisciplinarios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ObservacionesProcesosDisciplinarios $observacionesProcesosDisciplinarios */
        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->find($id);

        if (empty($observacionesProcesosDisciplinarios)) {
            return $this->sendError('Observaciones Procesos Disciplinarios not found');
        }

        return $this->sendResponse($observacionesProcesosDisciplinarios->toArray(), 'Observaciones Procesos Disciplinarios retrieved successfully');
    }

    /**
     * Update the specified ObservacionesProcesosDisciplinarios in storage.
     * PUT/PATCH /observacionesProcesosDisciplinarios/{id}
     *
     * @param int $id
     * @param UpdateObservacionesProcesosDisciplinariosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateObservacionesProcesosDisciplinariosAPIRequest $request)
    {
        $input = $request->all();

        /** @var ObservacionesProcesosDisciplinarios $observacionesProcesosDisciplinarios */
        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->find($id);

        if (empty($observacionesProcesosDisciplinarios)) {
            return $this->sendError('Observaciones Procesos Disciplinarios not found');
        }

        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->update($input, $id);

        return $this->sendResponse($observacionesProcesosDisciplinarios->toArray(), 'ObservacionesProcesosDisciplinarios updated successfully');
    }

    /**
     * Remove the specified ObservacionesProcesosDisciplinarios from storage.
     * DELETE /observacionesProcesosDisciplinarios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ObservacionesProcesosDisciplinarios $observacionesProcesosDisciplinarios */
        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->find($id);

        if (empty($observacionesProcesosDisciplinarios)) {
            return $this->sendError('Observaciones Procesos Disciplinarios not found');
        }

        $observacionesProcesosDisciplinarios->delete();

        return $this->sendResponse($id, 'Observaciones Procesos Disciplinarios deleted successfully');
    }
}
