@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('observacionesProcesosDisciplinarios.index') !!}">Observaciones Procesos Disciplinarios</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit Observaciones Procesos Disciplinarios</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($observacionesProcesosDisciplinarios, ['route' => ['observacionesProcesosDisciplinarios.update', $observacionesProcesosDisciplinarios->id], 'method' => 'patch']) !!}

                              @include('observaciones_procesos_disciplinarios.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection