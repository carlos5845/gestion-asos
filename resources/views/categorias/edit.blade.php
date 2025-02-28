@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Categoría</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('categorias.update', $idcategoria->idcategoria) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tipo">Tipo de Categoría:</label>
                    <input type="text" name="tipo" class="form-control" value="{{ $idcategoria->tipo }}" required>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
