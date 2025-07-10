<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" placeholder="Maria Pérez" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" placeholder="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                required placeholder="10 digitos - 01-23-45-67-89" maxlength="10" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!--Curp -->
        <div class="mt-4">
            <x-input-label for="curp" :value="__('Curp')" />
            <x-text-input id="curp" class="block mt-1 w-full" type="text" name="curp" :value="old('curp')"
                required placeholder="Ingresa tu Curp a 18 caracteres" maxlength="18" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div x-data="{ show: false }" class="relative mt-1">
                <input :type="show ? 'text' : 'password'" id="password" name="password"
                    class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    required autocomplete="new-password">

                <button type="button" class="absolute right-2 top-2 text-sm text-gray-600" @click="show = !show">
                    <span x-text="show ? 'Ocultar' : 'Ver'"></span>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">

           <div x-data="{ showConfirm: false }" class="relative mt-4">
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

    <input 
        :type="showConfirm ? 'text' : 'password'"
        id="password_confirmation"
        name="password_confirmation"
        class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        required autocomplete="new-password"
    >

    <button type="button"
        class="absolute right-2 top-9 text-sm text-gray-600"
        @click="showConfirm = !showConfirm"
    >
        <span x-text="showConfirm ? 'Ocultar' : 'Ver'"></span>
    </button>

    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

        </div>

        <div class="mt-4">
            <label class="flex items-center">
                <input type="checkbox" name="terminos" required>
                <span class="ml-2 text-sm text-gray-600">
                    Acepto los
                    <a href="#" target="_blank" class="underline text-blue-500">Términos y Condiciones</a>
                    y el
                    <a href="#" target="_blank" class="underline text-blue-500">Aviso de Privacidad</a>.
                </span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
