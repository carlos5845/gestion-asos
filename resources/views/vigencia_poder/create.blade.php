@extends('layouts.app')

@section('title', 'Agregar Vigencia de Poder')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Agregar Nueva Vigencia de Poder</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('vigencia_poder.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="partida_registral">Partida Registral:</label>
                    <input type="text" name="partida_registral" class="form-control" required maxlength="8">
                </div>

                <div class="form-group">
                    <label for="archivo_vigencia">Subir Archivo (PDF, DOCX, etc.):</label>
                    <input type="file" name="archivo_vigencia" class="form-control">
                </div>

                <div class="form-group">
                    <label for="grupo_idgrupo">Grupo:</label>
                    <select name="grupo_idgrupo" class="form-control" required>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->idgrupo }}">{{ $grupo->nombre_grupo }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('vigencia_poder.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
