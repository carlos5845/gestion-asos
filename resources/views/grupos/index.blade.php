@extends('layouts.app')

@section('title', 'Lista de Grupos')
@section('header', 'Gestión de Grupos')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Grupos</h3>
        <div class="card-tools">
            <a href="{{ route('grupos.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nuevo Grupo
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grupos as $grupo)
                <tr>
                    <td>{{ $grupo->idgrupo }}</td>
                    <td>{{ $grupo->nombre_grupo }}</td>
                    <td>{{ $grupo->ubicacion }}</td>
                    <td>
                        <a href="{{ route('grupos.edit', $grupo->idgrupo) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('grupos.destroy', $grupo->idgrupo) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
