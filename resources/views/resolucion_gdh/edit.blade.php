@extends('layouts.app')

@section('title', 'Editar Resolución GDH')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Resolución GDH</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('resolucion_gdh.update', $resolucion->idresolucion_gdh) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="num_resolucion">Número de Resolución:</label>
                    <input type="text" name="num_resolucion" class="form-control" value="{{ old('num_resolucion', $resolucion->num_resolucion) }}" required maxlength="45">
                </div>

                <div class="form-group">
                    <label for="fecha_emision">Fecha de Emisión:</label>
                    <input type="date" name="fecha_emision" class="form-control" value="{{ old('fecha_emision', $resolucion->fecha_emision) }}" required>
                </div>

                <div class="form-group">
                    <label for="archivo_gdh">Archivo Actual:</label>
                    @if($resolucion->archivo_gdh)
                        <p><a href="{{ asset('storage/' . $resolucion->archivo_gdh) }}" target="_blank">Ver Archivo</a></p>
                    @else
                        <p>No hay archivo subido.</p>
                    @endif
                    <label for="archivo_gdh">Subir Nuevo Archivo (Opcional):</label>
                    <input type="file" name="archivo_gdh" class="form-control">
                </div>

                <div class="form-group">
                    <label for="grupo_idgrupo">Grupo:</label>
                    <select name="grupo_idgrupo" class="form-control" required>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->idgrupo }}" {{ $grupo->idgrupo == $resolucion->grupo_idgrupo ? 'selected' : '' }}>
                                {{ $grupo->nombre_grupo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('resolucion_gdh.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
