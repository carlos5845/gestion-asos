<x-guest-layout>
   <form method="POST" action="{{ route('register') }}" class="w-full max-w-md bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6">
    @csrf

    <!-- Name -->
    <div class="mb-4">
        <x-input-label for="name" :value="__('Nombre')" class="text-sm font-semibold text-gray-600 dark:text-gray-300" />
        <x-text-input id="name" class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
    </div>

    <!-- Email Address -->
    <div class="mb-4">
        <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-600 dark:text-gray-300" />
        <x-text-input id="email" class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
    </div>

    <!-- Password -->
    <div class="mb-4">
        <x-input-label for="password" :value="__('Contraseña')" class="text-sm font-semibold text-gray-600 dark:text-gray-300" />
        <x-text-input id="password" class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" type="password" name="password" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
    </div>

    <!-- Confirm Password -->
    <div class="mb-4">
        <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-sm font-semibold text-gray-600 dark:text-gray-300" />
        <x-text-input id="password_confirmation" class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" type="password" name="password_confirmation" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
    </div>

    <!-- Links y Botón -->
    <div class="flex justify-between items-center">
        <a class="text-blue-500 hover:underline focus:ring-2 focus:ring-blue-500" href="{{ route('login') }}">
            {{ __('¿Ya estás registrado? Inicia sesión') }}
        </a>

        <x-primary-button class="py-2 px-6 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-all duration-200 focus:ring-2 focus:ring-blue-500">
            {{ __('Registrar') }}
        </x-primary-button>
    </div>
</form>

</x-guest-layout>
