@extends('layouts.app')

@section('title', 'Agregar Miembro de Junta Directiva')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Agregar Nuevo Miembro</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('junta_directiva.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="socio_dni">DNI del Socio:</label>
                    <input type="text" name="socio_dni" class="form-control" required maxlength="8">
                </div>

                <div class="form-group">
                    <label for="nom_apellido">Nombre y Apellido:</label>
                    <input type="text" name="nom_apellido" class="form-control" required maxlength="55">
                </div>

                <div class="form-group">
                    <label for="cargo_idcargo">Cargo:</label>
                    <select name="cargo_idcargo" class="form-control" required>
                        <option value="">Seleccione un cargo</option>
                        @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->idcargo }}">{{ $cargo->tipo_cargo }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input type="text" name="celular" class="form-control" maxlength="9">
                </div>

                <div class="form-group">
                    <label for="grupo_idgrupo">Grupo:</label>
                    <select name="grupo_idgrupo" class="form-control" required>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->idgrupo }}">{{ $grupo->nombre_grupo }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio:</label>
                    <input type="date" name="fecha_inicio" class="form-control">
                </div>

                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin:</label>
                    <input type="date" name="fecha_fin" class="form-control">
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control" required>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('junta_directiva.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
