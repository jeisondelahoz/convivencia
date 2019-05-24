@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('padresEstudiantes.index') !!}">Padres Estudiantes</a>
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
                              <strong>Edit Padres Estudiantes</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($padresEstudiantes, ['route' => ['padresEstudiantes.update', $padresEstudiantes->id], 'method' => 'patch']) !!}

                              @include('padres_estudiantes.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection