<!-- Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('year', 'Year:') !!}
    {!! Form::text('year', null, ['class' => 'form-control']) !!}
</div>

<!-- Asignaturas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asignaturas_id', 'Asignaturas Id:') !!}
    {!! Form::text('asignaturas_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Docentes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('docentes_id', 'Docentes Id:') !!}
    {!! Form::text('docentes_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Grupos Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grupos_id', 'Grupos Id:') !!}
    {!! Form::text('grupos_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('asignaturasDocentes.index') !!}" class="btn btn-default">Cancel</a>
</div>
