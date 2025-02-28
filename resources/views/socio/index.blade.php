@extends('layouts.app')

@section('title', 'Lista de Socios')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Socios</h3>
            <a href="{{ route('socio.create') }}" class="btn btn-primary float-right">Agregar Socio</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Departamento</th>
                        <th>Provincia</th>
                        <th>Distrito</th>
                        <th>Grupo</th>
                        <th>Código Puesto</th>
                        <th>Rubro</th>
                        <th>Estado</th>
                        <th>Observación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($socios as $socio)
                        <tr>
                            <td>{{ $socio->idsocio }}</td>
                            <td>{{ $socio->dni }}</td>
                            <td>{{ $socio->nombre }}</td>
                            <td>{{ $socio->apellido_pat }}</td>
                            <td>{{ $socio->apellido_mat ?? '-' }}</td>
                            <td>{{ $socio->departamento }}</td>
                            <td>{{ $socio->provincia }}</td>
                            <td>{{ $socio->distrito ?? '-' }}</td>
                            <td>{{ $socio->grupo->nombre_grupo }}</td>
                            <td>{{ $socio->cod_puesto ?? '-' }}</td>
                            <td>{{ $socio->rubro }}</td>
                            <td>{{ $socio->estado ? 'Activo' : 'Inactivo' }}</td>
                            <td>{{ $socio->observacion ?? '-' }}</td>
                            <td>
                                <a href="{{ route('socio.show', $socio->idsocio) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('socio.edit', $socio->idsocio) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('socio.destroy', $socio->idsocio) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este socio?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
