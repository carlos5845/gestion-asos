@extends('layouts.app')

@section('title', 'Detalles del Socio')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Socio</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $socio->idsocio }}</p>
            <p><strong>DNI:</strong> {{ $socio->dni }}</p>
            <p><strong>Nombre:</strong> {{ $socio->nombre }}</p>
            <p><strong>Apellido Paterno:</strong> {{ $socio->apellido_pat }}</p>
            <p><strong>Apellido Materno:</strong> {{ $socio->apellido_mat ?? '-' }}</p>
            <p><strong>Departamento:</strong> {{ $socio->departamento }}</p>
            <p><strong>Provincia:</strong> {{ $socio->provincia }}</p>
            <p><strong>Distrito:</strong> {{ $socio->distrito ?? '-' }}</p>
            <p><strong>Grupo:</strong> {{ $socio->grupo->nombre_grupo }}</p>
            <p><strong>Código Puesto:</strong> {{ $socio->cod_puesto ?? '-' }}</p>
            <p><strong>Rubro:</strong> {{ $socio->rubro }}</p>
            <p><strong>Estado:</strong> {{ $socio->estado ? 'Activo' : 'Inactivo' }}</p>
            <p><strong>Observación:</strong> {{ $socio->observacion ?? '-' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('socio.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
