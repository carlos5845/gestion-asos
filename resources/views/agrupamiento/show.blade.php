@extends('layouts.app')

@section('title', 'Detalles del Agrupamiento')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Agrupamiento</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $agrupamiento->idagrupamiento }}</p>
            <p><strong>Código Etiqueta:</strong> {{ $agrupamiento->cod_etiqueta }}</p>
            <p><strong>Nombre:</strong> {{ $agrupamiento->agrupamientocol }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('agrupamiento.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
