@extends('layouts.app')

@section('title', 'Detalles del Acta de Constitución')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Acta de Constitución</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $acta->idacta_constitucion }}</p>
            <p><strong>Fecha de Fundación:</strong> {{ $acta->fecha_fundacion ?? '-' }}</p>
            <p><strong>Archivo:</strong> 
                @if($acta->archivo_acta)
                    <a href="{{ asset('storage/' . $acta->archivo_acta) }}" target="_blank">Ver Archivo</a>
                @else
                    No disponible
                @endif
            </p>
            <p><strong>Grupo:</strong> {{ $acta->grupo->nombre_grupo }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('acta_constitucion.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
