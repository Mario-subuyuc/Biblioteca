<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div
            class="text-gray-700 dark:text-gray-300">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verify.post') }}">
        @csrf

        <div
            class="text-gray-700 dark:text-gray-300">

            <p class="text-gray-700 dark:text-gray-300 mb-6">
                Te hemos enviado un código a tu correo. Por favor, revisa tu bandeja de entrada.
            </p>
            <p class="text-gray-700 dark:text-gray-300">
                ¿No recibiste el código?
                <a href="{{ route('verify.resend') }}"
                    class="text-blue-600 dark:text-blue-400 font-medium hover:underline hover:text-blue-800 dark:hover:text-blue-300 transition-colors duration-200">
                    Volver a enviar
                </a>
            </p>
        </div>
        <br>
        <!-- Email Address -->
        <div>
            <x-input-label for="code" :value="__('Código')" />
            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        <!-- Mensaje de error -->
        @if (session('error'))
            <div
                class="text-gray-700 dark:text-gray-300">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('verificar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
