<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="grid grid-cols-2 sm:justify-center items-stretch pt-6 sm:pt-0 shadow-slate-800 shadow-md rounded-lg border-2 border-gray-500">
        <!-- Contenedor del formulario -->
        <div class="flex items-center justify-center h-full">
            <form method="POST" action="{{ route('login') }}" class="w-full max-w-md  dark:bg-gray-700 rounded-l-lg  p-6 h-full  flex flex-col justify-center">
                @csrf
                <div class="mb-5">
                    <h1 class="text-white text-3xl font-bold text-center mb-1">Bienvenido al gestor de asocciaciones </h1>
                    <h4 class="text-white text-center">Inicie sesión en su cuenta de</h4>
                </div>
                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-600 dark:text-gray-300" />
                    <x-text-input id="email" class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>
            
                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-sm font-semibold text-gray-600 dark:text-gray-300" />
                    <x-text-input id="password" class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>
            
                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded dark:bg-gray-800 dark:border-gray-700 focus:ring-blue-500" name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordar Datos') }}</label>
                </div>
            
                <!-- Links y Botón -->
                <div class="flex justify-between items-center mt-auto">
                    <div class="text-sm">
                        @if (Route::has('password.request'))
                            <a class="text-blue-500 hover:underline focus:ring-2 focus:ring-blue-500" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                        <br>
                        <a class="text-blue-500 hover:underline focus:ring-2 focus:ring-blue-500" href="{{ route('register') }}">
                            {{ __('¿Eres nuevo? Regístrate') }}
                        </a>
                    </div>
            
                    <x-primary-button class="py-2 px-6 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-all duration-200 focus:ring-2 focus:ring-blue-500">
                        {{ __('Iniciar Sesión') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    
        <!-- Contenedor de la imagen -->
        <div class="hidden sm:flex flex-col justify-center items-center h-full ">
            <img src="{{ asset('fondoe.webp') }}" alt="Login" class="w-full h-auto object-contain rounded-r-lg">
        </div>
    </div>
    
    
    
    
</x-guest-layout>   