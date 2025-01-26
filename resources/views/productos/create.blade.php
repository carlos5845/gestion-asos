@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
    <h1>Crear Producto</h1>
@endsection

@section('content')
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="row">
            {{-- Nombre --}}
            <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del producto" fgroup-class="col-md-6" required/>

            {{-- Precio --}}
            <x-adminlte-input name="precio" label="Precio" type="number" step="0.01" placeholder="Precio del producto" fgroup-class="col-md-6" required/>

            {{-- Stock --}}
            <x-adminlte-input name="stock" label="Stock" type="number" placeholder="Cantidad en stock" fgroup-class="col-md-6" required/>
        </div>

        {{-- Botones --}}
        <div class="row">
            <x-adminlte-button type="submit" label="Guardar" theme="success" class="col-md-3"/>
            <a href="{{ route('productos.index') }}" class="col-md-3">
                <x-adminlte-button label="Cancelar" theme="secondary" />
            </a>
        </div>
    </form>
@endsection

