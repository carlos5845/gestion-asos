@extends('layouts.app')

@section('title', 'Editar Padrón de Socios')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Padrón de Socios</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('padron_socios.update', $padron->idpadron_socios) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="grupo_idgrupo">Grupo:</label>
                    <select name="grupo_idgrupo" class="form-control" required>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->idgrupo }}" {{ $grupo->idgrupo == $padron->grupo_idgrupo ? 'selected' : '' }}>
                                {{ $grupo->nombre_grupo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="archivo_padron">Archivo Actual:</label>
                    @if($padron->archivo_padron)
                        <p><a href="{{ asset('storage/' . $padron->archivo_padron) }}" target="_blank">Ver Archivo</a></p>
                    @else
                        <p>No hay archivo subido.</p>
                    @endif
                    <label for="archivo_padron">Subir Nuevo Archivo (Opcional):</label>
                    <input type="file" name="archivo_padron" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('padron_socios.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
