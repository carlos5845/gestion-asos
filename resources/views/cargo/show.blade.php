@extends('layouts.app')

@section('title', 'Detalles del Cargo')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Cargo</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $cargo->idcargo }}</p>
            <p><strong>Tipo de Cargo:</strong> {{ $cargo->tipo_cargo }}</p>
            <p><strong>Fecha de Creación:</strong> {{ $cargo->created_at->format('d-m-Y') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('cargo.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
