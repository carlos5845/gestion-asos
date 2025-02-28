@extends('layouts.app')

@section('title', 'Crear Grupo')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Nuevo Grupo</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('grupo.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="etiqueta_grupo">Etiqueta:</label>
                    <input type="text" name="etiqueta_grupo" class="form-control" required maxlength="7">
                </div>
                <div class="form-group">
                    <label for="nombre_grupo">Nombre del Grupo:</label>
                    <input type="text" name="nombre_grupo" class="form-control" required maxlength="95">
                </div>
                <div class="form-group">
                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" name="ubicacion" class="form-control" required maxlength="45">
                </div>
                <div class="form-group">
                    <label for="agrupamiento_idagrupamiento">Agrupamiento:</label>
                    <select name="agrupamiento_idagrupamiento" class="form-control" required>
                        @foreach ($agrupamientos as $agrupamiento)
                            <option value="{{ $agrupamiento->idagrupamiento }}">{{ $agrupamiento->agrupamientocol }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="categoria_idcategoria">Categoría:</label>
                    <select name="categoria_idcategoria" class="form-control" required>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->idcategoria }}">{{ $categoria->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('grupo.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
