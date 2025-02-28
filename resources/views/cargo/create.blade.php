@extends('layouts.app')

@section('title', 'Agregar Cargo')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Agregar Nuevo Cargo</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('cargo.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="tipo_cargo">Tipo de Cargo:</label>
                    <input type="text" name="tipo_cargo" class="form-control" required maxlength="45">
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('cargo.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
