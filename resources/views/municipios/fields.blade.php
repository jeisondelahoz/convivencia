<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Departamentos Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departamentos_id', 'Departamentos Id:') !!}
    {!! Form::text('departamentos_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('municipios.index') !!}" class="btn btn-default">Cancel</a>
</div>
