<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $procesoDisciplinario->id !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $procesoDisciplinario->descripcion !!}</p>
</div>

<!-- Tipofalta Id Field -->
<div class="form-group">
    {!! Form::label('tipofalta_id', 'Tipofalta Id:') !!}
    <p>{!! $procesoDisciplinario->tipofalta_id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $procesoDisciplinario->user_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $procesoDisciplinario->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $procesoDisciplinario->updated_at !!}</p>
</div>

