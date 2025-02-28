@extends('layouts.app')

@section('title', 'Lista de Grupos')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Grupos</h3>
            @role('admin')
            <a href="{{ route('grupo.create') }}" class="btn btn-primary float-right">Agregar Grupo</a>
            @endrole
        
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Etiqueta</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Agrupamiento</th>
                        <th>Categoría</th>
                        @role('admin')
                        <th>Acciones</th>
                        @endrole

                    </tr>
                </thead>
                <tbody>
                    @foreach ($grupos as $grupo)
                        <tr>
                            <td>{{ $grupo->idgrupo }}</td>
                            <td>{{ $grupo->etiqueta_grupo }}</td>
                            <td>{{ $grupo->nombre_grupo }}</td>
                            <td>{{ $grupo->ubicacion }}</td>
                            <td>{{ $grupo->agrupamiento->agrupamientocol }}</td>
                            <td>{{ $grupo->categoria->tipo }}</td>
                           @role('admin')
                            <td>
                                <a href="{{ route('grupo.show', $grupo->idgrupo) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('grupo.edit', $grupo->idgrupo) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('grupo.destroy', $grupo->idgrupo) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este grupo?')">Eliminar</button>
                                </form>
                            </td>
                            @endrole
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
