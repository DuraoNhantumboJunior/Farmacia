<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Actualizar Fornecedor') }}
        </h2>
    </header>

    <form method="post" action="{{ route('update.fornecedor') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <x-text-input id="id" name="id" type="number" :value="$fornecedor->id" class="  hidden"></x-text-input>


        <div class="flex flex-wrap -mx-3">
            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="name" :value="__('Nome:')" />
                <x-text-input id="fornecedor" name="fornecedor" type="text" class="mt-1 block w-full" :value="old('fornecedor',$fornecedor->nome)" required autofocus autocomplete="fornecedor" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="email" :value="__('Email:')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email',$fornecedor->email)" required autocomplete="email" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="cell" :value="__('Contacto:')" />
                <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full" :value="old('cell',$fornecedor->telefone)" required autofocus autocomplete="telefone" />
                <x-input-error class="mt-2" :messages="$errors->get('cell')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="nuit" :value="__('NUIT')" />
                <x-text-input id="nuit" name="nuit" type="text" class="mt-1 block w-full" :value="old('nuit',$fornecedor->nuit)" required autofocus autocomplete="nuit" />
                <x-input-error class="mt-2" :messages="$errors->get('nuit')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="nuit" :value="__('Endereço:')" />
                <x-text-input id="endereco" name="endereco" type="text" class="mt-1 block w-full" :value="old('endereco',$fornecedor->endereco)" required autofocus autocomplete="endereco" />
                <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
            </div>
        </div>

        <div class="flex justify-end px-3 py-3">
            <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center right-4 bottom-4 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                </svg>
                Actualizar Fornecedor
            </button>
        </div>
    </form>

</section>