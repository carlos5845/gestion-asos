@extends('layouts.app')

@section('title', 'Agregar Acta de Constatación')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Agregar Nueva Acta de Constatación</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('acta_constatacion.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="num_constatacion">Número de Constatación:</label>
                    <input type="text" name="num_constatacion" class="form-control" required maxlength="45">
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('acta_constatacion.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
