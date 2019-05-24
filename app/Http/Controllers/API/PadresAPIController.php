<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePadresAPIRequest;
use App\Http\Requests\API\UpdatePadresAPIRequest;
use App\Models\Padres;
use App\Repositories\PadresRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PadresController
 * @package App\Http\Controllers\API
 */

class PadresAPIController extends AppBaseController
{
    /** @var  PadresRepository */
    private $padresRepository;

    public function __construct(PadresRepository $padresRepo)
    {
        $this->padresRepository = $padresRepo;
    }

    /**
     * Display a listing of the Padres.
     * GET|HEAD /padres
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $padres = $this->padresRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($padres->toArray(), 'Padres retrieved successfully');
    }

    /**
     * Store a newly created Padres in storage.
     * POST /padres
     *
     * @param CreatePadresAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePadresAPIRequest $request)
    {
        $input = $request->all();

        $padres = $this->padresRepository->create($input);

        return $this->sendResponse($padres->toArray(), 'Padres saved successfully');
    }

    /**
     * Display the specified Padres.
     * GET|HEAD /padres/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Padres $padres */
        $padres = $this->padresRepository->find($id);

        if (empty($padres)) {
            return $this->sendError('Padres not found');
        }

        return $this->sendResponse($padres->toArray(), 'Padres retrieved successfully');
    }

    /**
     * Update the specified Padres in storage.
     * PUT/PATCH /padres/{id}
     *
     * @param int $id
     * @param UpdatePadresAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePadresAPIRequest $request)
    {
        $input = $request->all();

        /** @var Padres $padres */
        $padres = $this->padresRepository->find($id);

        if (empty($padres)) {
            return $this->sendError('Padres not found');
        }

        $padres = $this->padresRepository->update($input, $id);

        return $this->sendResponse($padres->toArray(), 'Padres updated successfully');
    }

    /**
     * Remove the specified Padres from storage.
     * DELETE /padres/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Padres $padres */
        $padres = $this->padresRepository->find($id);

        if (empty($padres)) {
            return $this->sendError('Padres not found');
        }

        $padres->delete();

        return $this->sendResponse($id, 'Padres deleted successfully');
    }
}
