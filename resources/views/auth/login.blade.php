<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="w-full max-w-md bg-red dark:bg-gray-900 shadow-lg rounded-lg p-6">
        @csrf
    
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
        <div class="flex justify-between items-center">
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
    
</x-guest-layout>
