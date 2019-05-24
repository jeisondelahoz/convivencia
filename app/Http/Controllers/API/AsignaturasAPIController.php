<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsignaturasAPIRequest;
use App\Http\Requests\API\UpdateAsignaturasAPIRequest;
use App\Models\Asignaturas;
use App\Repositories\AsignaturasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AsignaturasController
 * @package App\Http\Controllers\API
 */

class AsignaturasAPIController extends AppBaseController
{
    /** @var  AsignaturasRepository */
    private $asignaturasRepository;

    public function __construct(AsignaturasRepository $asignaturasRepo)
    {
        $this->asignaturasRepository = $asignaturasRepo;
    }

    /**
     * Display a listing of the Asignaturas.
     * GET|HEAD /asignaturas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $asignaturas = $this->asignaturasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($asignaturas->toArray(), 'Asignaturas retrieved successfully');
    }

    /**
     * Store a newly created Asignaturas in storage.
     * POST /asignaturas
     *
     * @param CreateAsignaturasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAsignaturasAPIRequest $request)
    {
        $input = $request->all();

        $asignaturas = $this->asignaturasRepository->create($input);

        return $this->sendResponse($asignaturas->toArray(), 'Asignaturas saved successfully');
    }

    /**
     * Display the specified Asignaturas.
     * GET|HEAD /asignaturas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Asignaturas $asignaturas */
        $asignaturas = $this->asignaturasRepository->find($id);

        if (empty($asignaturas)) {
            return $this->sendError('Asignaturas not found');
        }

        return $this->sendResponse($asignaturas->toArray(), 'Asignaturas retrieved successfully');
    }

    /**
     * Update the specified Asignaturas in storage.
     * PUT/PATCH /asignaturas/{id}
     *
     * @param int $id
     * @param UpdateAsignaturasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsignaturasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Asignaturas $asignaturas */
        $asignaturas = $this->asignaturasRepository->find($id);

        if (empty($asignaturas)) {
            return $this->sendError('Asignaturas not found');
        }

        $asignaturas = $this->asignaturasRepository->update($input, $id);

        return $this->sendResponse($asignaturas->toArray(), 'Asignaturas updated successfully');
    }

    /**
     * Remove the specified Asignaturas from storage.
     * DELETE /asignaturas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Asignaturas $asignaturas */
        $asignaturas = $this->asignaturasRepository->find($id);

        if (empty($asignaturas)) {
            return $this->sendError('Asignaturas not found');
        }

        $asignaturas->delete();

        return $this->sendResponse($id, 'Asignaturas deleted successfully');
    }
}
