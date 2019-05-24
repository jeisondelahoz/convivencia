<!-- Es Acudiente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_acudiente', 'Es Acudiente:') !!}
    {!! Form::text('es_acudiente', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('padres.index') !!}" class="btn btn-default">Cancel</a>
</div>
