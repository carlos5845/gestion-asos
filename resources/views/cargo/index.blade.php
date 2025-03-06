@extends('layouts.app')

@section('title', 'Lista de Cargos')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Cargos</h3>
            <a href="{{ route('cargo.create') }}" class="btn btn-primary float-right">Agregar Cargo</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de Cargo</th>
                        <th>Fecha de Creación</th>
                        
                        @role('admin')
                        <th>Acciones</th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cargos as $cargo)
                        <tr>
                            <td>{{ $cargo->idcargo }}</td>
                            <td>{{ $cargo->tipo_cargo }}</td>
                            <td>{{ $cargo->created_at->format('d-m-Y') }}</td>
                           @role('admin')
                            <td>
                                <a href="{{ route('cargo.show', $cargo->idcargo) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('cargo.edit', $cargo->idcargo) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('cargo.destroy', $cargo->idcargo) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este cargo?')">Eliminar</button>
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
