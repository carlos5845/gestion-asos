@extends('layouts.app')

@section('title', 'Agregar Resolución GDH')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Agregar Nueva Resolución GDH</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('resolucion_gdh.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="num_resolucion">Número de Resolución:</label>
                    <input type="text" name="num_resolucion" class="form-control" required maxlength="45">
                </div>

                <div class="form-group">
                    <label for="fecha_emision">Fecha de Emisión:</label>
                    <input type="date" name="fecha_emision" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="archivo_gdh">Subir Archivo (PDF, DOCX, etc.):</label>
                    <input type="file" name="archivo_gdh" class="form-control">
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
                <a href="{{ route('resolucion_gdh.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
