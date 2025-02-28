@extends('layouts.app')

@section('title', 'Editar Acta de Constitución')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Acta de Constitución</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('acta_constitucion.update', $acta->idacta_constitucion) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="fecha_fundacion">Fecha de Fundación:</label>
                    <input type="date" name="fecha_fundacion" class="form-control" value="{{ old('fecha_fundacion', $acta->fecha_fundacion) }}">
                </div>

                <div class="form-group">
                    <label for="archivo_acta">Archivo Actual:</label>
                    @if($acta->archivo_acta)
                        <p><a href="{{ asset('storage/' . $acta->archivo_acta) }}" target="_blank">Ver Archivo</a></p>
                    @else
                        <p>No hay archivo subido.</p>
                    @endif
                    <label for="archivo_acta">Subir Nuevo Archivo (Opcional):</label>
                    <input type="file" name="archivo_acta" class="form-control">
                </div>

                <div class="form-group">
                    <label for="grupo_idgrupo">Grupo:</label>
                    <select name="grupo_idgrupo" class="form-control" required>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->idgrupo }}" {{ $grupo->idgrupo == $acta->grupo_idgrupo ? 'selected' : '' }}>
                                {{ $grupo->nombre_grupo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('acta_constitucion.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
