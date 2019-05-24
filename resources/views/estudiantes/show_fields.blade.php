<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $estudiantes->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $estudiantes->user_id !!}</p>
</div>

<!-- Grupos Id Field -->
<div class="form-group">
    {!! Form::label('grupos_id', 'Grupos Id:') !!}
    <p>{!! $estudiantes->grupos_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $estudiantes->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $estudiantes->updated_at !!}</p>
</div>

