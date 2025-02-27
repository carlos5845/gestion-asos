<x-guest-layout>
    <div class="grid grid-cols-2 sm:justify-center items-stretch pt-6 sm:pt-0 shadow-slate-800 shadow-md rounded-lg border-2 border-gray-500">
        <!-- Contenedor del formulario -->
        <div class="flex items-center justify-center h-full">
            <form method="POST" action="{{ route('register') }}" class="w-full max-w-md dark:bg-gray-700 rounded-l-lg p-6 h-full flex flex-col justify-center">
                @csrf
    
                <div class="mb-5">
                    <h1 class="text-white text-3xl font-bold text-center mb-1">Crea tu cuenta</h1>
                    <h4 class="text-white text-center">Regístrate para comenzar</h4>
                </div>
    
                <!-- Nombre -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Nombre')" class="text-sm font-semibold text-gray-600 dark:text-gray-300" />
                    <x-text-input id="name" class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                </div>
    
                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-600 dark:text-gray-300" />
                    <x-text-input id="email" class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>
    
                <!-- Contraseña -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-sm font-semibold text-gray-600 dark:text-gray-300" />
                    <x-text-input id="password" class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>
    
                <!-- Confirmar Contraseña -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-sm font-semibold text-gray-600 dark:text-gray-300" />
                    <x-text-input id="password_confirmation" class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                </div>
    
                <!-- Enlace y Botón -->
                <div class="flex justify-between items-center mt-auto">
                    <a class="text-blue-500 hover:underline focus:ring-2 focus:ring-blue-500" href="{{ route('login') }}">
                        {{ __('¿Ya tienes una cuenta? Inicia sesión') }}
                    </a>
    
                    <x-primary-button class="py-2 px-6 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-all duration-200 focus:ring-2 focus:ring-blue-500">
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    
        <!-- Contenedor de la imagen -->
        <div class="relative sm:flex flex-col justify-center items-center h-full">
            <img src="{{ asset('fondoe.webp') }}" alt="Registro" class="w-full h-full object-cover absolute inset-0 rounded-r-lg">
        </div>
        
    </div>
    

</x-guest-layout>
