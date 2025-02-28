@extends('layouts.app')

@section('title', 'Lista de Días Laborables')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Días Laborables</h3>
            <a href="{{ route('dia_laborable.create') }}" class="btn btn-primary float-right">Agregar Día Laborable</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Día</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dias as $dia)
                        <tr>
                            <td>{{ $dia->iddia_laborable }}</td>
                            <td>{{ $dia->dia }}</td>
                            <td>
                                <a href="{{ route('dia_laborable.show', $dia->iddia_laborable) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('dia_laborable.edit', $dia->iddia_laborable) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('dia_laborable.destroy', $dia->iddia_laborable) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este día laborable?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
