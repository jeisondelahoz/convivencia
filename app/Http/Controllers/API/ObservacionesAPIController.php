<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateObservacionesAPIRequest;
use App\Http\Requests\API\UpdateObservacionesAPIRequest;
use App\Models\Observaciones;
use App\Repositories\ObservacionesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ObservacionesController
 * @package App\Http\Controllers\API
 */

class ObservacionesAPIController extends AppBaseController
{
    /** @var  ObservacionesRepository */
    private $observacionesRepository;

    public function __construct(ObservacionesRepository $observacionesRepo)
    {
        $this->observacionesRepository = $observacionesRepo;
    }

    /**
     * Display a listing of the Observaciones.
     * GET|HEAD /observaciones
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $observaciones = $this->observacionesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($observaciones->toArray(), 'Observaciones retrieved successfully');
    }

    /**
     * Store a newly created Observaciones in storage.
     * POST /observaciones
     *
     * @param CreateObservacionesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateObservacionesAPIRequest $request)
    {
        $input = $request->all();

        $observaciones = $this->observacionesRepository->create($input);

        return $this->sendResponse($observaciones->toArray(), 'Observaciones saved successfully');
    }

    /**
     * Display the specified Observaciones.
     * GET|HEAD /observaciones/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Observaciones $observaciones */
        $observaciones = $this->observacionesRepository->find($id);

        if (empty($observaciones)) {
            return $this->sendError('Observaciones not found');
        }

        return $this->sendResponse($observaciones->toArray(), 'Observaciones retrieved successfully');
    }

    /**
     * Update the specified Observaciones in storage.
     * PUT/PATCH /observaciones/{id}
     *
     * @param int $id
     * @param UpdateObservacionesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateObservacionesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Observaciones $observaciones */
        $observaciones = $this->observacionesRepository->find($id);

        if (empty($observaciones)) {
            return $this->sendError('Observaciones not found');
        }

        $observaciones = $this->observacionesRepository->update($input, $id);

        return $this->sendResponse($observaciones->toArray(), 'Observaciones updated successfully');
    }

    /**
     * Remove the specified Observaciones from storage.
     * DELETE /observaciones/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Observaciones $observaciones */
        $observaciones = $this->observacionesRepository->find($id);

        if (empty($observaciones)) {
            return $this->sendError('Observaciones not found');
        }

        $observaciones->delete();

        return $this->sendResponse($id, 'Observaciones deleted successfully');
    }
}
