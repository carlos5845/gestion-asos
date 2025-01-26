<section>
    <header class="mb-4">
        <h2 class="h4 text-dark">
            {{ __('Actualizar contraseña') }}
        </h2>
        <p class="text-muted">
            {{ __('Asegúrese de que su cuenta utilice una contraseña larga y aleatoria para mantenerse segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">
                {{ __('Contraseña actual') }}
            </label>
            <input type="password" 
                   id="update_password_current_password" 
                   name="current_password" 
                   class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" 
                   autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
      
        <!-- New Password -->
        <div class="mb-3">
            <label for="update_ password_password" class="form-label">
                {{ __('Nueva Contraseña') }}
            </label>
            <input type="password" 
                   id="update_password_password" 
                   name="password" 
                   class="form-control @error('password', 'updatePassword') is-invalid @enderror" 
                   autocomplete="new-password">
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">
                {{ __('Confirmar Contraseña') }}
            </label>
            <input type="password" 
                   id="update_password_password_confirmation" 
                   name="password_confirmation" 
                   class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" 
                   autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Save Button -->
        <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p 
                    class="text-success ms-3 mb-0"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)">
                    {{ __('Guardado.') }}
                </p>
            @endif
        </div>
    </form>
</section>
