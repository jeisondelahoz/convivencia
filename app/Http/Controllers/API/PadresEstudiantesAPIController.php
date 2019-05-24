<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePadresEstudiantesAPIRequest;
use App\Http\Requests\API\UpdatePadresEstudiantesAPIRequest;
use App\Models\PadresEstudiantes;
use App\Repositories\PadresEstudiantesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PadresEstudiantesController
 * @package App\Http\Controllers\API
 */

class PadresEstudiantesAPIController extends AppBaseController
{
    /** @var  PadresEstudiantesRepository */
    private $padresEstudiantesRepository;

    public function __construct(PadresEstudiantesRepository $padresEstudiantesRepo)
    {
        $this->padresEstudiantesRepository = $padresEstudiantesRepo;
    }

    /**
     * Display a listing of the PadresEstudiantes.
     * GET|HEAD /padresEstudiantes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $padresEstudiantes = $this->padresEstudiantesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($padresEstudiantes->toArray(), 'Padres Estudiantes retrieved successfully');
    }

    /**
     * Store a newly created PadresEstudiantes in storage.
     * POST /padresEstudiantes
     *
     * @param CreatePadresEstudiantesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePadresEstudiantesAPIRequest $request)
    {
        $input = $request->all();

        $padresEstudiantes = $this->padresEstudiantesRepository->create($input);

        return $this->sendResponse($padresEstudiantes->toArray(), 'Padres Estudiantes saved successfully');
    }

    /**
     * Display the specified PadresEstudiantes.
     * GET|HEAD /padresEstudiantes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PadresEstudiantes $padresEstudiantes */
        $padresEstudiantes = $this->padresEstudiantesRepository->find($id);

        if (empty($padresEstudiantes)) {
            return $this->sendError('Padres Estudiantes not found');
        }

        return $this->sendResponse($padresEstudiantes->toArray(), 'Padres Estudiantes retrieved successfully');
    }

    /**
     * Update the specified PadresEstudiantes in storage.
     * PUT/PATCH /padresEstudiantes/{id}
     *
     * @param int $id
     * @param UpdatePadresEstudiantesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePadresEstudiantesAPIRequest $request)
    {
        $input = $request->all();

        /** @var PadresEstudiantes $padresEstudiantes */
        $padresEstudiantes = $this->padresEstudiantesRepository->find($id);

        if (empty($padresEstudiantes)) {
            return $this->sendError('Padres Estudiantes not found');
        }

        $padresEstudiantes = $this->padresEstudiantesRepository->update($input, $id);

        return $this->sendResponse($padresEstudiantes->toArray(), 'PadresEstudiantes updated successfully');
    }

    /**
     * Remove the specified PadresEstudiantes from storage.
     * DELETE /padresEstudiantes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PadresEstudiantes $padresEstudiantes */
        $padresEstudiantes = $this->padresEstudiantesRepository->find($id);

        if (empty($padresEstudiantes)) {
            return $this->sendError('Padres Estudiantes not found');
        }

        $padresEstudiantes->delete();

        return $this->sendResponse($id, 'Padres Estudiantes deleted successfully');
    }
}
