<li class="nav-item {{ Request::is('paises*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('paises.index') !!}"><i class="nav-icon icon-cursor"></i><span>Paises</span></a>
</li>
<li class="nav-item {{ Request::is('departamentos*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('departamentos.index') !!}"><i class="nav-icon icon-cursor"></i><span>Departamentos</span></a>
</li>
<li class="nav-item {{ Request::is('municipios*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('municipios.index') !!}"><i class="nav-icon icon-cursor"></i><span>Municipios</span></a>
</li>
<li class="nav-item {{ Request::is('tipoDocumentos*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('tipoDocumentos.index') !!}"><i class="nav-icon icon-cursor"></i><span>TipoDocumentos</span></a>
</li>
<li class="nav-item {{ Request::is('personas*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('personas.index') !!}"><i class="nav-icon icon-cursor"></i><span>Personas</span></a>
</li>
<li class="nav-item {{ Request::is('personas*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('personas.index') !!}"><i class="nav-icon icon-cursor"></i><span>Personas</span></a>
</li>
