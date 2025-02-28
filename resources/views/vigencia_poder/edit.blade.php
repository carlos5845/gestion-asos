@extends('layouts.app')

@section('title', 'Editar Vigencia de Poder')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Vigencia de Poder</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('vigencia_poder.update', $vigencia->idvigencia_poder) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="partida_registral">Partida Registral:</label>
                    <input type="text" name="partida_registral" class="form-control" value="{{ old('partida_registral', $vigencia->partida_registral) }}" required maxlength="8">
                </div>

                <div class="form-group">
                    <label for="archivo_vigencia">Archivo Actual:</label>
                    @if($vigencia->archivo_vigencia)
                        <p><a href="{{ asset('storage/' . $vigencia->archivo_vigencia) }}" target="_blank">Ver Archivo</a></p>
                    @else
                        <p>No hay archivo subido.</p>
                    @endif
                    <label for="archivo_vigencia">Subir Nuevo Archivo (Opcional):</label>
                    <input type="file" name="archivo_vigencia" class="form-control">
                </div>

                <div class="form-group">
                    <label for="grupo_idgrupo">Grupo:</label>
                    <select name="grupo_idgrupo" class="form-control" required>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->idgrupo }}" {{ $grupo->idgrupo == $vigencia->grupo_idgrupo ? 'selected' : '' }}>
                                {{ $grupo->nombre_grupo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('vigencia_poder.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
