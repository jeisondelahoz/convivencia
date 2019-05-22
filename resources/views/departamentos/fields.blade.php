<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Paises Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paises_id', 'Paises Id:') !!}
    {!! Form::text('paises_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('departamentos.index') !!}" class="btn btn-default">Cancel</a>
</div>
