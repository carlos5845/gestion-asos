@extends('layouts.app')

@section('title', 'Agregar Acta de Constitución')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Agregar Nueva Acta de Constitución</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('acta_constitucion.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="fecha_fundacion">Fecha de Fundación:</label>
                    <input type="date" name="fecha_fundacion" class="form-control">
                </div>

                <div class="form-group">
                    <label for="archivo_acta">Subir Archivo (PDF, DOCX, etc.):</label>
                    <input type="file" name="archivo_acta" class="form-control">
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
                <a href="{{ route('acta_constitucion.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
