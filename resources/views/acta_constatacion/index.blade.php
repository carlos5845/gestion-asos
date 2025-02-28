@extends('layouts.app')

@section('title', 'Lista de Actas de Constatación')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Actas de Constatación</h3>
            <a href="{{ route('acta_constatacion.create') }}" class="btn btn-primary float-right">Agregar Acta</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número de Constatación</th>
                        <th>Fecha de Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actas as $acta)
                        <tr>
                            <td>{{ $acta->idacta_constatacion }}</td>
                            <td>{{ $acta->num_constatacion }}</td>
                            <td>{{ $acta->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('acta_constatacion.show', $acta->idacta_constatacion) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('acta_constatacion.edit', $acta->idacta_constatacion) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('acta_constatacion.destroy', $acta->idacta_constatacion) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta acta?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
