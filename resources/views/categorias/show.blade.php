@extends('layouts.app')

@section('title', 'Detalles de la Categoría')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles de la Categoría</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $idcategoria->idcategoria }}</p>
            <p><strong>Tipo:</strong> {{ $idcategoria->tipo }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
