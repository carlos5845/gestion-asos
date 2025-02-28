@extends('layouts.app')

@section('title', 'Editar Grupo')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Grupo</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('grupo.update', $grupo->idgrupo) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="etiqueta_grupo">Etiqueta:</label>
                    <input type="text" name="etiqueta_grupo" class="form-control" value="{{ $grupo->etiqueta_grupo }}" required maxlength="7">
                </div>
                <div class="form-group">
                    <label for="nombre_grupo">Nombre del Grupo:</label>
                    <input type="text" name="nombre_grupo" class="form-control" value="{{ $grupo->nombre_grupo }}" required maxlength="95">
                </div>
                <div class="form-group">
                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" name="ubicacion" class="form-control" value="{{ $grupo->ubicacion }}" required maxlength="45">
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('grupo.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
