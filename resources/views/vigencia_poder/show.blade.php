@extends('layouts.app')

@section('title', 'Detalles de la Vigencia de Poder')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles de la Vigencia de Poder</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $vigencia->idvigencia_poder }}</p>
            <p><strong>Partida Registral:</strong> {{ $vigencia->partida_registral }}</p>
            <p><strong>Grupo:</strong> {{ $vigencia->grupo->nombre_grupo }}</p>
            <p><strong>Archivo:</strong> 
                @if($vigencia->archivo_vigencia)
                    <a href="{{ asset('storage/' . $vigencia->archivo_vigencia) }}" target="_blank">Ver Archivo</a>
                @else
                    No disponible
                @endif
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('vigencia_poder.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
