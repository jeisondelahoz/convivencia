<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsignaturasDocentesAPIRequest;
use App\Http\Requests\API\UpdateAsignaturasDocentesAPIRequest;
use App\Models\AsignaturasDocentes;
use App\Repositories\AsignaturasDocentesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AsignaturasDocentesController
 * @package App\Http\Controllers\API
 */

class AsignaturasDocentesAPIController extends AppBaseController
{
    /** @var  AsignaturasDocentesRepository */
    private $asignaturasDocentesRepository;

    public function __construct(AsignaturasDocentesRepository $asignaturasDocentesRepo)
    {
        $this->asignaturasDocentesRepository = $asignaturasDocentesRepo;
    }

    /**
     * Display a listing of the AsignaturasDocentes.
     * GET|HEAD /asignaturasDocentes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $asignaturasDocentes = $this->asignaturasDocentesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($asignaturasDocentes->toArray(), 'Asignaturas Docentes retrieved successfully');
    }

    /**
     * Store a newly created AsignaturasDocentes in storage.
     * POST /asignaturasDocentes
     *
     * @param CreateAsignaturasDocentesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAsignaturasDocentesAPIRequest $request)
    {
        $input = $request->all();

        $asignaturasDocentes = $this->asignaturasDocentesRepository->create($input);

        return $this->sendResponse($asignaturasDocentes->toArray(), 'Asignaturas Docentes saved successfully');
    }

    /**
     * Display the specified AsignaturasDocentes.
     * GET|HEAD /asignaturasDocentes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AsignaturasDocentes $asignaturasDocentes */
        $asignaturasDocentes = $this->asignaturasDocentesRepository->find($id);

        if (empty($asignaturasDocentes)) {
            return $this->sendError('Asignaturas Docentes not found');
        }

        return $this->sendResponse($asignaturasDocentes->toArray(), 'Asignaturas Docentes retrieved successfully');
    }

    /**
     * Update the specified AsignaturasDocentes in storage.
     * PUT/PATCH /asignaturasDocentes/{id}
     *
     * @param int $id
     * @param UpdateAsignaturasDocentesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsignaturasDocentesAPIRequest $request)
    {
        $input = $request->all();

        /** @var AsignaturasDocentes $asignaturasDocentes */
        $asignaturasDocentes = $this->asignaturasDocentesRepository->find($id);

        if (empty($asignaturasDocentes)) {
            return $this->sendError('Asignaturas Docentes not found');
        }

        $asignaturasDocentes = $this->asignaturasDocentesRepository->update($input, $id);

        return $this->sendResponse($asignaturasDocentes->toArray(), 'AsignaturasDocentes updated successfully');
    }

    /**
     * Remove the specified AsignaturasDocentes from storage.
     * DELETE /asignaturasDocentes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AsignaturasDocentes $asignaturasDocentes */
        $asignaturasDocentes = $this->asignaturasDocentesRepository->find($id);

        if (empty($asignaturasDocentes)) {
            return $this->sendError('Asignaturas Docentes not found');
        }

        $asignaturasDocentes->delete();

        return $this->sendResponse($id, 'Asignaturas Docentes deleted successfully');
    }
}
