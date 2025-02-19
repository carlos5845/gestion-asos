<section class="mb-4">
    <header class="mb-3">
        <h2 class="h4 text-dark">
            {{ __('Información de perfil') }}
        </h2>
        <p class="text-muted">
            {{ __("Actualice la información del perfil y la dirección de correo electrónico de su cuenta.") }}
        </p>
    </header>

    <!-- Formulario para enviar verificación de correo -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Formulario para actualizar perfil -->
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')
        <!-- Campo Nombre -->
        <x-adminlte-input 
        name="name" 
        label="{{ __('Nombre') }}" 
        placeholder="Ingrese su nombre" 
        label-class="text-lightblue" 
        value="{{ old('name', $user->name) }}" 
        required 
        autofocus 
        autocomplete="name" 
        error-key="name">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    
        <!-- Campo Email -->
    <x-adminlte-input 
        name="email" 
        label="{{ __('Email') }}" 
        type="email" 
        placeholder="Ingrese su correo electrónico" 
        label-class="text-lightblue" 
        value="{{ old('email', $user->email) }}" 
        required 
        autocomplete="username" 
        error-key="email">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-envelope text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

<!-- Verificación de correo -->
@if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
<div class="mt-2">
    <p class="text-muted">
        {{ __('Su dirección de correo electrónico no está verificada.') }}
        <button 
            form="send-verification" 
            class="btn btn-link p-0 text-decoration-none">
            {{ __('Haga clic aquí para volver a enviar el correo electrónico de verificación.') }}
        </button>
    </p>

    @if (session('status') === 'verification-link-sent')
        <p class="text-success mt-2">
            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
        </p>
    @endif
</div>
@endif


<!-- Verificación de correo -->
@if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
<div class="mt-2">
    <p class="text-muted">
        {{ __('Su dirección de correo electrónico no está verificada.') }}
        <button 
            form="send-verification" 
            class="btn btn-link p-0 text-decoration-none">
            {{ __('Haga clic aquí para volver a enviar el correo electrónico de verificación.') }}
        </button>
    </p>

    @if (session('status') === 'verification-link-sent')
        <p class="text-success mt-2">
            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
        </p>
    @endif
</div>
@endif


        <!-- Botón Guardar -->
        <div class="d-flex align-items-center">
            <x-adminlte-button 
                type="submit" 
                label="{{ __('Guardar') }}" 
                theme="primary" 
                class="me-3" 
                icon="fas fa-save" />
                @if (session('status') === 'profile-updated')
                    <p 
                        class="text-success mb-0"
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ __('Guardado.') }}
                    </p>
                @endif
        </div>
    </form>
</section>
