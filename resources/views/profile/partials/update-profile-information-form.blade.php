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

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name', $user->name) }}" 
                required 
                autofocus 
                autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> 


        <!-- Campo Email -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email', $user->email) }}" 
                required 
                autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          

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
                            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico..') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

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
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Guardar') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-success m-0">
                    {{ __('Guardado.') }}
                </p>
            @endif
        </div>
    </form>
</section>
