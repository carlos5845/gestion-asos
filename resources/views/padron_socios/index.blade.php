@extends('layouts.app')

@section('title', 'Lista de Padrón de Socios')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Padrón de Socios</h3>
            <a href="{{ route('padron_socios.create') }}" class="btn btn-primary float-right">Agregar Padrón</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Archivo</th>
                        <th>Grupo</th>
                        <th>Fecha de Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($padron_socios as $padron)
                        <tr>
                            <td>{{ $padron->idpadron_socios }}</td>
                            <td>
                                @if($padron->archivo_padron)
                                    <a href="{{ asset('storage/' . $padron->archivo_padron) }}" target="_blank">Ver Archivo</a>
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>{{ $padron->grupo->nombre_grupo }}</td>
                            <td>{{ $padron->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('padron_socios.show', $padron->idpadron_socios) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('padron_socios.edit', $padron->idpadron_socios) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('padron_socios.destroy', $padron->idpadron_socios) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este padrón?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
