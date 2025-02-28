@extends('layouts.app')

@section('title', 'Detalles de Miembro de Junta Directiva')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Miembro</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $miembro->idjunta_directiva }}</p>
            <p><strong>DNI:</strong> {{ $miembro->socio_dni }}</p>
            <p><strong>Nombre:</strong> {{ $miembro->nom_apellido }}</p>
            <p><strong>Cargo:</strong> {{ $miembro->cargo->tipo_cargo }}</p>
            <p><strong>Estado:</strong> {{ $miembro->estado ? 'Activo' : 'Inactivo' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('junta_directiva.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
