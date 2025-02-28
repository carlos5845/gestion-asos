@extends('layouts.app')

@section('title', 'Editar Agrupamiento')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Agrupamiento</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('agrupamiento.update', $agrupamiento->idagrupamiento) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="cod_etiqueta">Código Etiqueta:</label>
                    <input type="text" name="cod_etiqueta" class="form-control" value="{{ $agrupamiento->cod_etiqueta }}" required maxlength="15">
                </div>
                <div class="form-group">
                    <label for="agrupamientocol">Nombre del Agrupamiento:</label>
                    <input type="text" name="agrupamientocol" class="form-control" value="{{ $agrupamiento->agrupamientocol }}" required maxlength="45">
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('agrupamiento.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
