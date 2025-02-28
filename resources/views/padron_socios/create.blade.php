@extends('layouts.app')

@section('title', 'Agregar Padrón de Socios')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Agregar Nuevo Padrón de Socios</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('padron_socios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="grupo_idgrupo">Grupo:</label>
                    <select name="grupo_idgrupo" class="form-control" required>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->idgrupo }}">{{ $grupo->nombre_grupo }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="archivo_padron">Subir Archivo (PDF, DOCX, etc.):</label>
                    <input type="file" name="archivo_padron" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('padron_socios.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
