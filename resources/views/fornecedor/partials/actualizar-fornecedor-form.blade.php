<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Actualizar Fornecedor') }}
        </h2>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="flex flex-wrap -mx-3">
            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="name" :value="__('Nome:')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="email" :value="__('Email:')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="cell" :value="__('Contacto:')" />
                <x-text-input id="cell" name="cell" type="text" class="mt-1 block w-full" :value="old('cell')" required autofocus autocomplete="cell" />
                <x-input-error class="mt-2" :messages="$errors->get('cell')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="nuit" :value="__('NUIT')" />
                <x-text-input id="nuit" name="nuit" type="text" class="mt-1 block w-full" :value="old('nuit')" required autofocus autocomplete="nuit" />
                <x-input-error class="mt-2" :messages="$errors->get('nuit')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="nuit" :value="__('Endereço:')" />
                <x-text-input id="nuit" name="nuit" type="text" class="mt-1 block w-full" :value="old('endereco')" required autofocus autocomplete="nuit" />
                <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
            </div>
        </div>

    </form>
    <div class="py-6">
        <button class="bg-green-400 inline-flex items-center px-4 py-2  dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
            </svg>
            Actualizar Fornecedor
        </button>
    </div>
</section>