@extends('layouts.app')

@section('title', 'Lista de Agrupamientos')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Agrupamientos</h3>
            <a href="{{ route('agrupamiento.create') }}" class="btn btn-primary float-right">Agregar Agrupamiento</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Código Etiqueta</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agrupamientos as $agrupamiento)
                        <tr>
                            <td>{{ $agrupamiento->idagrupamiento }}</td>
                            <td>{{ $agrupamiento->cod_etiqueta }}</td>
                            <td>{{ $agrupamiento->agrupamientocol }}</td>
                            <td>
                                <a href="{{ route('agrupamiento.show', $agrupamiento->idagrupamiento) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('agrupamiento.edit', $agrupamiento->idagrupamiento) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('agrupamiento.destroy', $agrupamiento->idagrupamiento) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este agrupamiento?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
