@extends('layouts.app')

@section('title', 'Editar Grupo')
@section('header', 'Editar Grupo')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('grupos.update', $grupo->idgrupo) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Nombre del Grupo</label>
                <input type="text" name="nombre_grupo" class="form-control" value="{{ $grupo->nombre_grupo }}" required>
            </div>
            <div class="form-group">
                <label>Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" value="{{ $grupo->ubicacion }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection
