<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateObservacionesProcesosDisciplinariosRequest;
use App\Http\Requests\UpdateObservacionesProcesosDisciplinariosRequest;
use App\Repositories\ObservacionesProcesosDisciplinariosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ObservacionesProcesosDisciplinariosController extends AppBaseController
{
    /** @var  ObservacionesProcesosDisciplinariosRepository */
    private $observacionesProcesosDisciplinariosRepository;

    public function __construct(ObservacionesProcesosDisciplinariosRepository $observacionesProcesosDisciplinariosRepo)
    {
        $this->observacionesProcesosDisciplinariosRepository = $observacionesProcesosDisciplinariosRepo;
    }

    /**
     * Display a listing of the ObservacionesProcesosDisciplinarios.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->paginate(10);

        return view('observaciones_procesos_disciplinarios.index')
            ->with('observacionesProcesosDisciplinarios', $observacionesProcesosDisciplinarios);
    }

    /**
     * Show the form for creating a new ObservacionesProcesosDisciplinarios.
     *
     * @return Response
     */
    public function create()
    {
        return view('observaciones_procesos_disciplinarios.create');
    }

    /**
     * Store a newly created ObservacionesProcesosDisciplinarios in storage.
     *
     * @param CreateObservacionesProcesosDisciplinariosRequest $request
     *
     * @return Response
     */
    public function store(CreateObservacionesProcesosDisciplinariosRequest $request)
    {
        $input = $request->all();

        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->create($input);

        Flash::success('Observaciones Procesos Disciplinarios saved successfully.');

        return redirect(route('observacionesProcesosDisciplinarios.index'));
    }

    /**
     * Display the specified ObservacionesProcesosDisciplinarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->find($id);

        if (empty($observacionesProcesosDisciplinarios)) {
            Flash::error('Observaciones Procesos Disciplinarios not found');

            return redirect(route('observacionesProcesosDisciplinarios.index'));
        }

        return view('observaciones_procesos_disciplinarios.show')->with('observacionesProcesosDisciplinarios', $observacionesProcesosDisciplinarios);
    }

    /**
     * Show the form for editing the specified ObservacionesProcesosDisciplinarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->find($id);

        if (empty($observacionesProcesosDisciplinarios)) {
            Flash::error('Observaciones Procesos Disciplinarios not found');

            return redirect(route('observacionesProcesosDisciplinarios.index'));
        }

        return view('observaciones_procesos_disciplinarios.edit')->with('observacionesProcesosDisciplinarios', $observacionesProcesosDisciplinarios);
    }

    /**
     * Update the specified ObservacionesProcesosDisciplinarios in storage.
     *
     * @param int $id
     * @param UpdateObservacionesProcesosDisciplinariosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateObservacionesProcesosDisciplinariosRequest $request)
    {
        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->find($id);

        if (empty($observacionesProcesosDisciplinarios)) {
            Flash::error('Observaciones Procesos Disciplinarios not found');

            return redirect(route('observacionesProcesosDisciplinarios.index'));
        }

        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->update($request->all(), $id);

        Flash::success('Observaciones Procesos Disciplinarios updated successfully.');

        return redirect(route('observacionesProcesosDisciplinarios.index'));
    }

    /**
     * Remove the specified ObservacionesProcesosDisciplinarios from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $observacionesProcesosDisciplinarios = $this->observacionesProcesosDisciplinariosRepository->find($id);

        if (empty($observacionesProcesosDisciplinarios)) {
            Flash::error('Observaciones Procesos Disciplinarios not found');

            return redirect(route('observacionesProcesosDisciplinarios.index'));
        }

        $this->observacionesProcesosDisciplinariosRepository->delete($id);

        Flash::success('Observaciones Procesos Disciplinarios deleted successfully.');

        return redirect(route('observacionesProcesosDisciplinarios.index'));
    }
}
