<!-- Tipo Documentos Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_documentos_id', 'Tipo Documentos Id:') !!}
    {!! Form::text('tipo_documentos_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Documento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('documento', 'Documento:') !!}
    {!! Form::text('documento', null, ['class' => 'form-control']) !!}
</div>

<!-- Primernombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primerNombre', 'Primernombre:') !!}
    {!! Form::text('primerNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Segundonombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segundoNombre', 'Segundonombre:') !!}
    {!! Form::text('segundoNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Primerapellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primerApellido', 'Primerapellido:') !!}
    {!! Form::text('primerApellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Segundoapellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segundoApellido', 'Segundoapellido:') !!}
    {!! Form::text('segundoApellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechanacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaNacimiento', 'Fechanacimiento:') !!}
    {!! Form::text('fechaNacimiento', null, ['class' => 'form-control','id'=>'fechaNacimiento']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#fechaNacimiento').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endsection

<!-- Telefonofijo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefonoFijo', 'Telefonofijo:') !!}
    {!! Form::text('telefonoFijo', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefonocelular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefonoCelular', 'Telefonocelular:') !!}
    {!! Form::text('telefonoCelular', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::text('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Municipios Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('municipios_id', 'Municipios Id:') !!}
    {!! Form::text('municipios_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('personas.index') !!}" class="btn btn-default">Cancel</a>
</div>
