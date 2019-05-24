<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Areas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('areas_id', 'Areas Id:') !!}
    {!! Form::text('areas_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Grados Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grados_id', 'Grados Id:') !!}
    {!! Form::text('grados_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('asignaturas.index') !!}" class="btn btn-default">Cancel</a>
</div>
