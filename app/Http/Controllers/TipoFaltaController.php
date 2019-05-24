<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoFaltaRequest;
use App\Http\Requests\UpdateTipoFaltaRequest;
use App\Repositories\TipoFaltaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TipoFaltaController extends AppBaseController
{
    /** @var  TipoFaltaRepository */
    private $tipoFaltaRepository;

    public function __construct(TipoFaltaRepository $tipoFaltaRepo)
    {
        $this->tipoFaltaRepository = $tipoFaltaRepo;
    }

    /**
     * Display a listing of the TipoFalta.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoFaltas = $this->tipoFaltaRepository->paginate(10);

        return view('tipo_faltas.index')
            ->with('tipoFaltas', $tipoFaltas);
    }

    /**
     * Show the form for creating a new TipoFalta.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_faltas.create');
    }

    /**
     * Store a newly created TipoFalta in storage.
     *
     * @param CreateTipoFaltaRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoFaltaRequest $request)
    {
        $input = $request->all();

        $tipoFalta = $this->tipoFaltaRepository->create($input);

        Flash::success('Tipo Falta saved successfully.');

        return redirect(route('tipoFaltas.index'));
    }

    /**
     * Display the specified TipoFalta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoFalta = $this->tipoFaltaRepository->find($id);

        if (empty($tipoFalta)) {
            Flash::error('Tipo Falta not found');

            return redirect(route('tipoFaltas.index'));
        }

        return view('tipo_faltas.show')->with('tipoFalta', $tipoFalta);
    }

    /**
     * Show the form for editing the specified TipoFalta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoFalta = $this->tipoFaltaRepository->find($id);

        if (empty($tipoFalta)) {
            Flash::error('Tipo Falta not found');

            return redirect(route('tipoFaltas.index'));
        }

        return view('tipo_faltas.edit')->with('tipoFalta', $tipoFalta);
    }

    /**
     * Update the specified TipoFalta in storage.
     *
     * @param int $id
     * @param UpdateTipoFaltaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoFaltaRequest $request)
    {
        $tipoFalta = $this->tipoFaltaRepository->find($id);

        if (empty($tipoFalta)) {
            Flash::error('Tipo Falta not found');

            return redirect(route('tipoFaltas.index'));
        }

        $tipoFalta = $this->tipoFaltaRepository->update($request->all(), $id);

        Flash::success('Tipo Falta updated successfully.');

        return redirect(route('tipoFaltas.index'));
    }

    /**
     * Remove the specified TipoFalta from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoFalta = $this->tipoFaltaRepository->find($id);

        if (empty($tipoFalta)) {
            Flash::error('Tipo Falta not found');

            return redirect(route('tipoFaltas.index'));
        }

        $this->tipoFaltaRepository->delete($id);

        Flash::success('Tipo Falta deleted successfully.');

        return redirect(route('tipoFaltas.index'));
    }
}
