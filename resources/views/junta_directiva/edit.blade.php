@extends('layouts.app')

@section('title', 'Editar Miembro de Junta Directiva')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Miembro</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('junta_directiva.update', $miembro->idjunta_directiva) }}" method="POST">
                @csrf
                @method('PUT')

                @include('junta_directiva.partials.form')

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('junta_directiva.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
