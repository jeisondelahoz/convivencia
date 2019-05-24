<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProcesoDisciplinarioRequest;
use App\Http\Requests\UpdateProcesoDisciplinarioRequest;
use App\Repositories\ProcesoDisciplinarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProcesoDisciplinarioController extends AppBaseController
{
    /** @var  ProcesoDisciplinarioRepository */
    private $procesoDisciplinarioRepository;

    public function __construct(ProcesoDisciplinarioRepository $procesoDisciplinarioRepo)
    {
        $this->procesoDisciplinarioRepository = $procesoDisciplinarioRepo;
    }

    /**
     * Display a listing of the ProcesoDisciplinario.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $procesoDisciplinarios = $this->procesoDisciplinarioRepository->paginate(10);

        return view('proceso_disciplinarios.index')
            ->with('procesoDisciplinarios', $procesoDisciplinarios);
    }

    /**
     * Show the form for creating a new ProcesoDisciplinario.
     *
     * @return Response
     */
    public function create()
    {
        return view('proceso_disciplinarios.create');
    }

    /**
     * Store a newly created ProcesoDisciplinario in storage.
     *
     * @param CreateProcesoDisciplinarioRequest $request
     *
     * @return Response
     */
    public function store(CreateProcesoDisciplinarioRequest $request)
    {
        $input = $request->all();

        $procesoDisciplinario = $this->procesoDisciplinarioRepository->create($input);

        Flash::success('Proceso Disciplinario saved successfully.');

        return redirect(route('procesoDisciplinarios.index'));
    }

    /**
     * Display the specified ProcesoDisciplinario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $procesoDisciplinario = $this->procesoDisciplinarioRepository->find($id);

        if (empty($procesoDisciplinario)) {
            Flash::error('Proceso Disciplinario not found');

            return redirect(route('procesoDisciplinarios.index'));
        }

        return view('proceso_disciplinarios.show')->with('procesoDisciplinario', $procesoDisciplinario);
    }

    /**
     * Show the form for editing the specified ProcesoDisciplinario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $procesoDisciplinario = $this->procesoDisciplinarioRepository->find($id);

        if (empty($procesoDisciplinario)) {
            Flash::error('Proceso Disciplinario not found');

            return redirect(route('procesoDisciplinarios.index'));
        }

        return view('proceso_disciplinarios.edit')->with('procesoDisciplinario', $procesoDisciplinario);
    }

    /**
     * Update the specified ProcesoDisciplinario in storage.
     *
     * @param int $id
     * @param UpdateProcesoDisciplinarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProcesoDisciplinarioRequest $request)
    {
        $procesoDisciplinario = $this->procesoDisciplinarioRepository->find($id);

        if (empty($procesoDisciplinario)) {
            Flash::error('Proceso Disciplinario not found');

            return redirect(route('procesoDisciplinarios.index'));
        }

        $procesoDisciplinario = $this->procesoDisciplinarioRepository->update($request->all(), $id);

        Flash::success('Proceso Disciplinario updated successfully.');

        return redirect(route('procesoDisciplinarios.index'));
    }

    /**
     * Remove the specified ProcesoDisciplinario from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $procesoDisciplinario = $this->procesoDisciplinarioRepository->find($id);

        if (empty($procesoDisciplinario)) {
            Flash::error('Proceso Disciplinario not found');

            return redirect(route('procesoDisciplinarios.index'));
        }

        $this->procesoDisciplinarioRepository->delete($id);

        Flash::success('Proceso Disciplinario deleted successfully.');

        return redirect(route('procesoDisciplinarios.index'));
    }
}
