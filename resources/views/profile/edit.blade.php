@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Perfil') }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="container">
        <div class="row">
            <!-- Formulario para actualizar información del perfil -->
            <div class="col-12 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Formulario para actualizar contraseña -->
            <div class="col-12 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Formulario para eliminar usuario -->
            <div class="col-12 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@push('js')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@endpush