@extends('layouts.app')

@section('title', 'Detalles del Acta de Constatación')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Acta de Constatación</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $acta->idacta_constatacion }}</p>
            <p><strong>Número de Constatación:</strong> {{ $acta->num_constatacion }}</p>
            <p><strong>Fecha de Creación:</strong> {{ $acta->created_at->format('d-m-Y') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('acta_constatacion.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
