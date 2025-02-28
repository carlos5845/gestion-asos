@extends('layouts.app')

@section('title', 'Editar Socio')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Socio</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('socio.update', $socio->idsocio) }}" method="POST">
                @csrf
                @method('PUT')

                @include('socio.partials.form')

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('socio.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
