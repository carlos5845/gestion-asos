@extends('layouts.app')

@section('title', 'Lista de Resoluciones GDH')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Resoluciones GDH</h3>
            <a href="{{ route('resolucion_gdh.create') }}" class="btn btn-primary float-right">Agregar Resolución</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número de Resolución</th>
                        <th>Fecha de Emisión</th>
                        <th>Archivo</th>
                        <th>Grupo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resoluciones as $resolucion)
                        <tr>
                            <td>{{ $resolucion->idresolucion_gdh }}</td>
                            <td>{{ $resolucion->num_resolucion }}</td>
                            <td>{{ $resolucion->fecha_emision }}</td>
                            <td>
                                @if($resolucion->archivo_gdh)
                                    <a href="{{ asset('storage/' . $resolucion->archivo_gdh) }}" target="_blank">Ver Archivo</a>
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>{{ $resolucion->grupo->nombre_grupo }}</td>
                            <td>
                                <a href="{{ route('resolucion_gdh.show', $resolucion->idresolucion_gdh) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('resolucion_gdh.edit', $resolucion->idresolucion_gdh) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('resolucion_gdh.destroy', $resolucion->idresolucion_gdh) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta resolución?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
