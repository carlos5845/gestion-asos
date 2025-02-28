@extends('layouts.app')

@section('title', 'Agregar Día Laborable')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Agregar Nuevo Día Laborable</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('dia_laborable.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="dia">Nombre del Día:</label>
                    <input type="text" name="dia" class="form-control" required maxlength="35">
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('dia_laborable.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
