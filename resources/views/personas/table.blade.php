<table class="table table-responsive-sm table-striped" id="personas-table">
    <thead>
        <th>Tipo Documentos Id</th>
        <th>Documento</th>
        <th>Primernombre</th>
        <th>Segundonombre</th>
        <th>Primerapellido</th>
        <th>Segundoapellido</th>
        <th>Fechanacimiento</th>
        <th>Telefonofijo</th>
        <th>Telefonocelular</th>
        <th>Direccion</th>
        <th>Users Id</th>
        <th>Municipios Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($personas as $personas)
        <tr>
            <td>{!! $personas->tipo_documentos_id !!}</td>
            <td>{!! $personas->documento !!}</td>
            <td>{!! $personas->primerNombre !!}</td>
            <td>{!! $personas->segundoNombre !!}</td>
            <td>{!! $personas->primerApellido !!}</td>
            <td>{!! $personas->segundoApellido !!}</td>
            <td>{!! $personas->fechaNacimiento !!}</td>
            <td>{!! $personas->telefonoFijo !!}</td>
            <td>{!! $personas->telefonoCelular !!}</td>
            <td>{!! $personas->direccion !!}</td>
            <td>{!! $personas->users_id !!}</td>
            <td>{!! $personas->municipios_id !!}</td>
            <td>
                {!! Form::open(['route' => ['personas.destroy', $personas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('personas.show', [$personas->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('personas.edit', [$personas->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>