<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex flex-col gap-4">
            <!-- Nombre -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Correo -->
            <div>
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Teléfono -->
            <div>
                <x-input-label for="phone" :value="__('Teléfono')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Dirección -->
            <div>
                <x-input-label for="address" :value="__('Dirección')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    required />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
        </div>

        <hr class="my-6">


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            <!-- Fecha de Nacimiento -->
            <div>
                <x-input-label for="birth_date" :value="__('Fecha de Nacimiento')" />
                <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date"
                    :value="old('birth_date')" />
                <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
            </div>

            <!-- Género -->
            <div>
                <x-input-label for="gender" :value="__('Género')" />
                <select id="gender" name="gender" class="block mt-1 w-full border-gray-300 rounded-md">
                    <option value="">Selecciona...</option>
                    <option value="masculino" {{ old('gender') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="femenino" {{ old('gender') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                    <option value="otro" {{ old('gender') == 'otro' ? 'selected' : '' }}>Otro</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- DPI -->
            <div>
                <x-input-label for="dpi" :value="__('DPI')" />
                <x-text-input id="dpi" class="block mt-1 w-full" type="text" name="dpi" :value="old('dpi')"
                    required />
                <x-input-error :messages="$errors->get('dpi')" class="mt-2" />
            </div>

            <!-- Ocupación -->
            <div>
                <x-input-label for="occupation" :value="__('Ocupación')" />
                <x-text-input id="occupation" class="block mt-1 w-full" type="text" name="occupation"
                    :value="old('occupation')" />
                <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
            </div>

            <!-- Etnia -->
            <div>
                <x-input-label for="ethnicity" :value="__('Etnia')" />
                <select id="ethnicity" name="ethnicity" class="block mt-1 w-full border-gray-300 rounded-md">
                    <option value="">Selecciona...</option>
                    <option value="maya" {{ old('ethnicity') == 'maya' ? 'selected' : '' }}>Maya</option>
                    <option value="ladina" {{ old('ethnicity') == 'ladina' ? 'selected' : '' }}>Ladina</option>
                    <option value="garifuna" {{ old('ethnicity') == 'garifuna' ? 'selected' : '' }}>Garífuna</option>
                    <option value="xinca" {{ old('ethnicity') == 'xinca' ? 'selected' : '' }}>Xinca</option>
                    <option value="mestizo" {{ old('ethnicity') == 'mestizo' ? 'selected' : '' }}>Mestizo</option>
                    <option value="otro" {{ old('ethnicity') == 'otro' ? 'selected' : '' }}>Otro</option>
                </select>
                <x-input-error :messages="$errors->get('ethnicity')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div>
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Contraseña -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('¿Ya tienes cuenta?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
