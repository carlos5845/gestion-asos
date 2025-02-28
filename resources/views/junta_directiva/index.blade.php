@extends('layouts.app')

@section('title', 'Lista de Junta Directiva')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Junta Directiva</h3>
            <a href="{{ route('junta_directiva.create') }}" class="btn btn-primary float-right">Agregar Miembro</a>
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
                        <th>Nombre y Apellido</th>
                        <th>Cargo</th>
                        <th>Celular</th>
                        <th>Grupo</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($junta_directiva as $miembro)
                        <tr>
                            <td>{{ $miembro->idjunta_directiva }}</td>
                            <td>{{ $miembro->socio_dni }}</td>
                            <td>{{ $miembro->nom_apellido }}</td>
                            <td>{{ $miembro->cargo->nombre_cargo }}</td>
                            <td>{{ $miembro->celular ?? '-' }}</td>
                            <td>{{ $miembro->grupo->nombre_grupo }}</td>
                            <td>{{ $miembro->fecha_inicio }}</td>
                            <td>{{ $miembro->fecha_fin }}</td>
                            <td>{{ $miembro->estado ? 'Activo' : 'Inactivo' }}</td>
                            <td>
                                <a href="{{ route('junta_directiva.show', $miembro->idjunta_directiva) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('junta_directiva.edit', $miembro->idjunta_directiva) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('junta_directiva.destroy', $miembro->idjunta_directiva) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este miembro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
