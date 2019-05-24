<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDocentesAPIRequest;
use App\Http\Requests\API\UpdateDocentesAPIRequest;
use App\Models\Docentes;
use App\Repositories\DocentesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DocentesController
 * @package App\Http\Controllers\API
 */

class DocentesAPIController extends AppBaseController
{
    /** @var  DocentesRepository */
    private $docentesRepository;

    public function __construct(DocentesRepository $docentesRepo)
    {
        $this->docentesRepository = $docentesRepo;
    }

    /**
     * Display a listing of the Docentes.
     * GET|HEAD /docentes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $docentes = $this->docentesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($docentes->toArray(), 'Docentes retrieved successfully');
    }

    /**
     * Store a newly created Docentes in storage.
     * POST /docentes
     *
     * @param CreateDocentesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDocentesAPIRequest $request)
    {
        $input = $request->all();

        $docentes = $this->docentesRepository->create($input);

        return $this->sendResponse($docentes->toArray(), 'Docentes saved successfully');
    }

    /**
     * Display the specified Docentes.
     * GET|HEAD /docentes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Docentes $docentes */
        $docentes = $this->docentesRepository->find($id);

        if (empty($docentes)) {
            return $this->sendError('Docentes not found');
        }

        return $this->sendResponse($docentes->toArray(), 'Docentes retrieved successfully');
    }

    /**
     * Update the specified Docentes in storage.
     * PUT/PATCH /docentes/{id}
     *
     * @param int $id
     * @param UpdateDocentesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocentesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Docentes $docentes */
        $docentes = $this->docentesRepository->find($id);

        if (empty($docentes)) {
            return $this->sendError('Docentes not found');
        }

        $docentes = $this->docentesRepository->update($input, $id);

        return $this->sendResponse($docentes->toArray(), 'Docentes updated successfully');
    }

    /**
     * Remove the specified Docentes from storage.
     * DELETE /docentes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Docentes $docentes */
        $docentes = $this->docentesRepository->find($id);

        if (empty($docentes)) {
            return $this->sendError('Docentes not found');
        }

        $docentes->delete();

        return $this->sendResponse($id, 'Docentes deleted successfully');
    }
}
