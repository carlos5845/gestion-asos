@extends('layouts.app')

@section('title', 'Detalles del Grupo')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Grupo</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $grupo->idgrupo }}</p>
            <p><strong>Etiqueta:</strong> {{ $grupo->etiqueta_grupo }}</p>
            <p><strong>Nombre:</strong> {{ $grupo->nombre_grupo }}</p>
            <p><strong>Ubicación:</strong> {{ $grupo->ubicacion }}</p>
            <p><strong>Agrupamiento:</strong> {{ $grupo->agrupamiento->agrupamientocol }}</p>
            <p><strong>Categoría:</strong> {{ $grupo->categoria->tipo }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('grupo.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
