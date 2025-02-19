<section class="mb-4">
    <header class="mb-3">
        <h2 class="h4 text-dark">
            {{ __('Eliminar Cuenta') }}
        </h2>
        <p class="text-muted">
            {{ __('Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar su cuenta, descargue cualquier dato o información que desee conservar.') }}
        </p>
    </header>
    
    <!-- Botón para abrir el modal -->
    <x-adminlte-button 
        label="{{ __('Eliminar Cuenta') }}" 
        theme="danger" 
        icon="fas fa-trash-alt" 
        data-bs-toggle="modal" 
        data-bs-target="#confirm-user-deletion" />
    

    <!-- Modal de confirmación -->
    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="confirm-user-deletion-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title" id="confirm-user-deletion-label">
                            {{ __('¿Estás seguro de que quieres eliminar tu cuenta?') }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p>
                            {{ __('Una vez que su cuenta se elimine, todos sus recursos y datos se eliminarán permanentemente. Ingrese su contraseña para confirmar que desea eliminar permanentemente su cuenta.') }}
                        </p>

                        <!-- Campo de contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                            <input 
                                type="text" 
                                id="password" 
                                name="password" 
                                class="form-control @error('password', 'userDeletion') is-invalid @enderror" 
                                placeholder="{{ __('Contraseña') }}">
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ __('Cancelar') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            {{ __('Eliminar Cuenta') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
