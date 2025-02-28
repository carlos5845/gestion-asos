@extends('layouts.app')

@section('title', 'Detalles del Padrón de Socios')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Padrón de Socios</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $padron->idpadron_socios }}</p>
            <p><strong>Grupo:</strong> {{ $padron->grupo->nombre_grupo }}</p>
            <p><strong>Archivo:</strong> 
                @if($padron->archivo_padron)
                    <a href="{{ asset('storage/' . $padron->archivo_padron) }}" target="_blank">Ver Archivo</a>
                @else
                    No disponible
                @endif
            </p>
            <p><strong>Fecha de Creación:</strong> {{ $padron->created_at->format('d-m-Y') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('padron_socios.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
