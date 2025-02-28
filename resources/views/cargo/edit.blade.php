@extends('layouts.app')

@section('title', 'Editar Cargo')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Cargo</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('cargo.update', $cargo->idcargo) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="tipo_cargo">Tipo de Cargo:</label>
                    <input type="text" name="tipo_cargo" class="form-control" value="{{ old('tipo_cargo', $cargo->tipo_cargo) }}" required maxlength="45">
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('cargo.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
