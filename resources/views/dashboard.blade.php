@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    {{ __("Bienvenido al dashboard.") }}
                </div>
            </div>
        </div>
    </div>
@endsection
