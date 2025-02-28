@extends('layouts.app')

@section('title', 'Lista de Categorías')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Categorías</h3>
            <a href="{{ route('categorias.create') }}" class="btn btn-primary float-right">Agregar Categoría</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->idcategoria }}</td>
                            <td>{{ $categoria->tipo }}</td>
                            <td>
                                <a href="{{ route('categorias.show', $categoria->idcategoria) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('categorias.edit', $categoria->idcategoria) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('categorias.destroy', $categoria->idcategoria) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta categoría?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
