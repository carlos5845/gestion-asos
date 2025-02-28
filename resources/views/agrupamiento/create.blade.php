@extends('layouts.app')

@section('title', 'Crear Agrupamiento')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Nuevo Agrupamiento</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('agrupamiento.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="cod_etiqueta">Código Etiqueta:</label>
                    <input type="text" name="cod_etiqueta" class="form-control" required maxlength="15">
                </div>
                <div class="form-group">
                    <label for="agrupamientocol">Nombre del Agrupamiento:</label>
                    <input type="text" name="agrupamientocol" class="form-control" required maxlength="45">
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('agrupamiento.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
