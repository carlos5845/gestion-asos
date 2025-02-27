@extends('layouts.app')

@section('title', 'Crear Grupo')

@section('content_header')
    <h1>Nuevo Grupo</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Crear un Nuevo Grupo</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('grupos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre_grupo">Nombre del Grupo</label>
                <input type="text" id="nombre_grupo" name="nombre_grupo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <input type="text" id="ubicacion" name="ubicacion" class="form-control" required>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection
