<!-- Padres Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('padres_id', 'Padres Id:') !!}
    {!! Form::text('padres_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estudiantes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estudiantes_id', 'Estudiantes Id:') !!}
    {!! Form::text('estudiantes_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('padresEstudiantes.index') !!}" class="btn btn-default">Cancel</a>
</div>
