@extends('layouts.app')

@section('title', 'Crear Socio')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Nuevo Socio</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('socio.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input type="text" name="dni" class="form-control" required maxlength="8">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" required maxlength="45">
                </div>

                <div class="form-group">
                    <label for="apellido_pat">Apellido Paterno:</label>
                    <input type="text" name="apellido_pat" class="form-control" required maxlength="45">
                </div>

                <div class="form-group">
                    <label for="apellido_mat">Apellido Materno:</label>
                    <input type="text" name="apellido_mat" class="form-control" maxlength="45">
                </div>

                <div class="form-group">
                    <label for="departamento">Departamento:</label>
                    <input type="text" name="departamento" class="form-control" required maxlength="45">
                </div>

                <div class="form-group">
                    <label for="provincia">Provincia:</label>
                    <input type="text" name="provincia" class="form-control" required maxlength="45">
                </div>

                <div class="form-group">
                    <label for="distrito">Distrito:</label>
                    <input type="text" name="distrito" class="form-control" maxlength="45">
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
                    <label for="cod_puesto">Código Puesto:</label>
                    <input type="text" name="cod_puesto" class="form-control" maxlength="7">
                </div>

                <div class="form-group">
                    <label for="rubro">Rubro:</label>
                    <input type="text" name="rubro" class="form-control" required maxlength="75">
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control" required>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="observacion">Observaciones:</label>
                    <textarea name="observacion" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('socio.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
