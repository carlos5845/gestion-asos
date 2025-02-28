@extends('layouts.app')

@section('title', 'Detalles de la Resolución GDH')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles de la Resolución GDH</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $resolucion->idresolucion_gdh }}</p>
            <p><strong>Número de Resolución:</strong> {{ $resolucion->num_resolucion }}</p>
            <p><strong>Fecha de Emisión:</strong> {{ $resolucion->fecha_emision }}</p>
            <p><strong>Grupo:</strong> {{ $resolucion->grupo->nombre_grupo }}</p>
            <p><strong>Archivo:</strong> 
                @if($resolucion->archivo_gdh)
                    <a href="{{ asset('storage/' . $resolucion->archivo_gdh) }}" target="_blank">Ver Archivo</a>
                @else
                    No disponible
                @endif
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('resolucion_gdh.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
