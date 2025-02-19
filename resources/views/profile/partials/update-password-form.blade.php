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
        <x-adminlte-input 
        name="current_password" 
        label="{{ __('Contraseña actual') }}" 
        type="password" 
        placeholder="Ingrese su contraseña actual" 
        label-class="text-lightblue" 
        autocomplete="current-password" 
        error-key="updatePassword.current_password" 
        id="current-password">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-lock text-lightblue"></i>
            </div>
        </x-slot>
        <x-slot name="appendSlot">
            <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('current-password')">
                <i class="fas fa-eye" id="current-password-eye"></i>
            </button>
        </x-slot>
    </x-adminlte-input>
    
      

        <!-- New Password -->
        <x-adminlte-input 
        name="password" 
        label="{{ __('Nueva Contraseña') }}" 
        type="password" 
        placeholder="Ingrese su nueva contraseña" 
        label-class="text-lightblue" 
        autocomplete="new-password" 
        error-key="updatePassword.password" 
        id="new-password">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-lock text-lightblue"></i>
            </div>
        </x-slot>
        <x-slot name="appendSlot">
            <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('new-password')">
                <i class="fas fa-eye" id="new-password-eye"></i>
            </button>
        </x-slot>
        </x-adminlte-input>

        <!-- Confirm Password -->
        <x-adminlte-input 
        name="password_confirmation" 
        label="{{ __('Confirmar Contraseña') }}" 
        type="password" 
        placeholder="Confirme su nueva contraseña" 
        label-class="text-lightblue" 
        autocomplete="new-password" 
        error-key="updatePassword.password_confirmation" 
        id="confirm-password">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-lock text-lightblue"></i>
            </div>
        </x-slot>
        <x-slot name="appendSlot">
            <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('confirm-password')">
                <i class="fas fa-eye" id="confirm-password-eye"></i>
            </button>
        </x-slot>
        </x-adminlte-input>
        

        <!-- Save Button -->
        <div class="d-flex align-items-center">
            <x-adminlte-button 
                type="submit" 
                label="{{ __('Guardar') }}" 
                theme="primary" 
                class="me-3" 
                icon="fas fa-save" />
        
            @if (session('status') === 'password-updated')
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
        
        <script>
            function togglePasswordVisibility(inputId) {
                const input = document.getElementById(inputId);
                const eyeIcon = document.getElementById(`${inputId}-eye`);
                if (input.type === "password") {
                    input.type = "text";
                    eyeIcon.classList.remove("fa-eye");
                    eyeIcon.classList.add("fa-eye-slash");
                } else {
                    input.type = "password";
                    eyeIcon.classList.remove("fa-eye-slash");
                    eyeIcon.classList.add("fa-eye");
                }
            }
            
        </script>
    </form>
</section>
