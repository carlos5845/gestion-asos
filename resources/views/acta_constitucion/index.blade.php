@extends('layouts.app')

@section('title', 'Lista de Actas de Constitución')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Actas de Constitución</h3>
            <a href="{{ route('acta_constitucion.create') }}" class="btn btn-primary float-right">Agregar Acta</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de Fundación</th>
                        <th>Archivo</th>
                        <th>Grupo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actas as $acta)
                        <tr>
                            <td>{{ $acta->idacta_constitucion }}</td>
                            <td>{{ $acta->fecha_fundacion ?? '-' }}</td>
                            <td>
                                @if($acta->archivo_acta)
                                    <a href="{{ asset('storage/' . $acta->archivo_acta) }}" target="_blank">Ver Archivo</a>
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>{{ $acta->grupo->nombre_grupo }}</td>
                            <td>
                                <a href="{{ route('acta_constitucion.show', $acta->idacta_constitucion) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('acta_constitucion.edit', $acta->idacta_constitucion) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('acta_constitucion.destroy', $acta->idacta_constitucion) }}" method="POST" style="display:inline;">
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
