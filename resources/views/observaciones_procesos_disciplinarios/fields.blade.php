<!-- Observaciones Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observaciones_id', 'Observaciones Id:') !!}
    {!! Form::text('observaciones_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Procesodisciplinario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('procesodisciplinario_id', 'Procesodisciplinario Id:') !!}
    {!! Form::text('procesodisciplinario_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('observacionesProcesosDisciplinarios.index') !!}" class="btn btn-default">Cancel</a>
</div>
