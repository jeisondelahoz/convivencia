<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('paises', 'PaisesAPIController');

Route::resource('departamentos', 'DepartamentosAPIController');

Route::resource('municipios', 'MunicipiosAPIController');

Route::resource('tipo_documentos', 'TipoDocumentosAPIController');

Route::resource('personas', 'PersonasAPIController');

Route::resource('personas', 'PersonasAPIController');

Route::resource('docentes', 'DocentesAPIController');

Route::resource('areas', 'AreasAPIController');

Route::resource('grupos', 'GruposAPIController');

Route::resource('grados', 'GradosAPIController');

Route::resource('asignaturas', 'AsignaturasAPIController');

Route::resource('asignaturas_docentes', 'AsignaturasDocentesAPIController');

Route::resource('roles', 'RolesAPIController');

Route::resource('estudiantes', 'EstudiantesAPIController');

Route::resource('estudiantes', 'EstudiantesAPIController');

Route::resource('padres', 'PadresAPIController');

Route::resource('padres_estudiantes', 'PadresEstudiantesAPIController');

Route::resource('tipo_observaciones', 'TipoObservacionesAPIController');

Route::resource('observaciones', 'ObservacionesAPIController');

Route::resource('tipo_faltas', 'TipoFaltaAPIController');

Route::resource('tipo_faltas', 'TipoFaltaAPIController');

Route::resource('proceso_disciplinarios', 'ProcesoDisciplinarioAPIController');

Route::resource('observaciones_procesos_disciplinarios', 'ObservacionesProcesosDisciplinariosAPIController');

Route::resource('observaciones_procesos_disciplinarios', 'ObservacionesProcesosDisciplinariosAPIController');