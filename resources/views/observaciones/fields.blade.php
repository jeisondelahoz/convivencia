<!-- Motivacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('motivacion', 'Motivacion:') !!}
    {!! Form::text('motivacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Visibilidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visibilidad', 'Visibilidad:') !!}
    {!! Form::text('visibilidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipoobservaciones Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoobservaciones_id', 'Tipoobservaciones Id:') !!}
    {!! Form::text('tipoobservaciones_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estudiantes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estudiantes_id', 'Estudiantes Id:') !!}
    {!! Form::text('estudiantes_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('observaciones.index') !!}" class="btn btn-default">Cancel</a>
</div>
