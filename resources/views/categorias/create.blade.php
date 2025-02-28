@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Nueva Categoría</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tipo">Tipo de Categoría:</label>
                    <input type="text" name="tipo" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
