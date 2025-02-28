@extends('layouts.app')

@section('title', 'Lista de Vigencias de Poder')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Vigencias de Poder</h3>
            <a href="{{ route('vigencia_poder.create') }}" class="btn btn-primary float-right">Agregar Vigencia</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Partida Registral</th>
                        <th>Archivo</th>
                        <th>Grupo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vigencias as $vigencia)
                        <tr>
                            <td>{{ $vigencia->idvigencia_poder }}</td>
                            <td>{{ $vigencia->partida_registral }}</td>
                            <td>
                                @if($vigencia->archivo_vigencia)
                                    <a href="{{ asset('storage/' . $vigencia->archivo_vigencia) }}" target="_blank">Ver Archivo</a>
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>{{ $vigencia->grupo->nombre_grupo }}</td>
                            <td>
                                <a href="{{ route('vigencia_poder.show', $vigencia->idvigencia_poder) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('vigencia_poder.edit', $vigencia->idvigencia_poder) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('vigencia_poder.destroy', $vigencia->idvigencia_poder) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta vigencia?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
