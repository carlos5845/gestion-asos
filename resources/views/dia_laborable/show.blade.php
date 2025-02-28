@extends('layouts.app')

@section('title', 'Detalles del Día Laborable')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Día Laborable</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $dia->iddia_laborable }}</p>
            <p><strong>Nombre del Día:</strong> {{ $dia->dia }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('dia_laborable.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
