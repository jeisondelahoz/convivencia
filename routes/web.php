<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback');

Route::resource('paises', 'PaisesController');

Route::resource('departamentos', 'DepartamentosController');

Route::resource('municipios', 'MunicipiosController');

Route::resource('tipoDocumentos', 'TipoDocumentosController');

Route::resource('personas', 'PersonasController');

Route::resource('personas', 'PersonasController');

Route::resource('docentes', 'DocentesController');

Route::resource('areas', 'AreasController');

Route::resource('grupos', 'GruposController');

Route::resource('grados', 'GradosController');

Route::resource('asignaturas', 'AsignaturasController');

Route::resource('asignaturasDocentes', 'AsignaturasDocentesController');

Route::resource('roles', 'RolesController');

Route::resource('estudiantes', 'EstudiantesController');

Route::resource('estudiantes', 'EstudiantesController');

Route::resource('padres', 'PadresController');

Route::resource('padresEstudiantes', 'PadresEstudiantesController');

Route::resource('tipoObservaciones', 'TipoObservacionesController');

Route::resource('observaciones', 'ObservacionesController');

Route::resource('tipoFaltas', 'TipoFaltaController');

Route::resource('tipoFaltas', 'TipoFaltaController');

Route::resource('procesoDisciplinarios', 'ProcesoDisciplinarioController');

Route::resource('observacionesProcesosDisciplinarios', 'ObservacionesProcesosDisciplinariosController');

Route::resource('observacionesProcesosDisciplinarios', 'ObservacionesProcesosDisciplinariosController');