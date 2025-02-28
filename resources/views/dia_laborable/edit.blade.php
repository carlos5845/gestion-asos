@extends('layouts.app')

@section('title', 'Editar Día Laborable')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Día Laborable</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('dia_laborable.update', $dia->iddia_laborable) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="dia">Nombre del Día:</label>
                    <input type="text" name="dia" class="form-control" value="{{ old('dia', $dia->dia) }}" required maxlength="35">
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('dia_laborable.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
