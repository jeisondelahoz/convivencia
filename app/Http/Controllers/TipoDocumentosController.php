<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoDocumentosRequest;
use App\Http\Requests\UpdateTipoDocumentosRequest;
use App\Repositories\TipoDocumentosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TipoDocumentosController extends AppBaseController
{
    /** @var  TipoDocumentosRepository */
    private $tipoDocumentosRepository;

    public function __construct(TipoDocumentosRepository $tipoDocumentosRepo)
    {
        $this->tipoDocumentosRepository = $tipoDocumentosRepo;
    }

    /**
     * Display a listing of the TipoDocumentos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoDocumentos = $this->tipoDocumentosRepository->paginate(10);

        return view('tipo_documentos.index')
            ->with('tipoDocumentos', $tipoDocumentos);
    }

    /**
     * Show the form for creating a new TipoDocumentos.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_documentos.create');
    }

    /**
     * Store a newly created TipoDocumentos in storage.
     *
     * @param CreateTipoDocumentosRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoDocumentosRequest $request)
    {
        $input = $request->all();

        $tipoDocumentos = $this->tipoDocumentosRepository->create($input);

        Flash::success('Tipo Documentos saved successfully.');

        return redirect(route('tipoDocumentos.index'));
    }

    /**
     * Display the specified TipoDocumentos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoDocumentos = $this->tipoDocumentosRepository->find($id);

        if (empty($tipoDocumentos)) {
            Flash::error('Tipo Documentos not found');

            return redirect(route('tipoDocumentos.index'));
        }

        return view('tipo_documentos.show')->with('tipoDocumentos', $tipoDocumentos);
    }

    /**
     * Show the form for editing the specified TipoDocumentos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoDocumentos = $this->tipoDocumentosRepository->find($id);

        if (empty($tipoDocumentos)) {
            Flash::error('Tipo Documentos not found');

            return redirect(route('tipoDocumentos.index'));
        }

        return view('tipo_documentos.edit')->with('tipoDocumentos', $tipoDocumentos);
    }

    /**
     * Update the specified TipoDocumentos in storage.
     *
     * @param int $id
     * @param UpdateTipoDocumentosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoDocumentosRequest $request)
    {
        $tipoDocumentos = $this->tipoDocumentosRepository->find($id);

        if (empty($tipoDocumentos)) {
            Flash::error('Tipo Documentos not found');

            return redirect(route('tipoDocumentos.index'));
        }

        $tipoDocumentos = $this->tipoDocumentosRepository->update($request->all(), $id);

        Flash::success('Tipo Documentos updated successfully.');

        return redirect(route('tipoDocumentos.index'));
    }

    /**
     * Remove the specified TipoDocumentos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoDocumentos = $this->tipoDocumentosRepository->find($id);

        if (empty($tipoDocumentos)) {
            Flash::error('Tipo Documentos not found');

            return redirect(route('tipoDocumentos.index'));
        }

        $this->tipoDocumentosRepository->delete($id);

        Flash::success('Tipo Documentos deleted successfully.');

        return redirect(route('tipoDocumentos.index'));
    }
}
