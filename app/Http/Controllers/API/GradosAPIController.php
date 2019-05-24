<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGradosAPIRequest;
use App\Http\Requests\API\UpdateGradosAPIRequest;
use App\Models\Grados;
use App\Repositories\GradosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GradosController
 * @package App\Http\Controllers\API
 */

class GradosAPIController extends AppBaseController
{
    /** @var  GradosRepository */
    private $gradosRepository;

    public function __construct(GradosRepository $gradosRepo)
    {
        $this->gradosRepository = $gradosRepo;
    }

    /**
     * Display a listing of the Grados.
     * GET|HEAD /grados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $grados = $this->gradosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($grados->toArray(), 'Grados retrieved successfully');
    }

    /**
     * Store a newly created Grados in storage.
     * POST /grados
     *
     * @param CreateGradosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGradosAPIRequest $request)
    {
        $input = $request->all();

        $grados = $this->gradosRepository->create($input);

        return $this->sendResponse($grados->toArray(), 'Grados saved successfully');
    }

    /**
     * Display the specified Grados.
     * GET|HEAD /grados/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Grados $grados */
        $grados = $this->gradosRepository->find($id);

        if (empty($grados)) {
            return $this->sendError('Grados not found');
        }

        return $this->sendResponse($grados->toArray(), 'Grados retrieved successfully');
    }

    /**
     * Update the specified Grados in storage.
     * PUT/PATCH /grados/{id}
     *
     * @param int $id
     * @param UpdateGradosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGradosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Grados $grados */
        $grados = $this->gradosRepository->find($id);

        if (empty($grados)) {
            return $this->sendError('Grados not found');
        }

        $grados = $this->gradosRepository->update($input, $id);

        return $this->sendResponse($grados->toArray(), 'Grados updated successfully');
    }

    /**
     * Remove the specified Grados from storage.
     * DELETE /grados/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Grados $grados */
        $grados = $this->gradosRepository->find($id);

        if (empty($grados)) {
            return $this->sendError('Grados not found');
        }

        $grados->delete();

        return $this->sendResponse($id, 'Grados deleted successfully');
    }
}
