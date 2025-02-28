@extends('layouts.app')

@section('title', 'Editar Acta de Constatación')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Acta de Constatación</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('acta_constatacion.update', $acta->idacta_constatacion) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="num_constatacion">Número de Constatación:</label>
                    <input type="text" name="num_constatacion" class="form-control" value="{{ old('num_constatacion', $acta->num_constatacion) }}" required maxlength="45">
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('acta_constatacion.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
