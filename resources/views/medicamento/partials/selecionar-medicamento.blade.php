<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Medicamentos') }}
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
                <x-input-label for="apresentacao" :value="__('Apresentação:')" />
                <x-text-input id="apresentacao" name="apresentacao" type="text" class="mt-1 block w-full" :value="old('apresentacao')" required autocomplete="username" disabled="true" />
                <x-input-error class="mt-2" :messages="$errors->get('apresentacao')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="medida" :value="__('Unidade de Medida:')" />
                <x-text-input id="medida" name="medida" type="text" class="mt-1 block w-full read-only:true" :value="old('medida')" required autofocus autocomplete="medida" disabled="true" />
                <x-input-error class="mt-2" :messages="$errors->get('medida')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="composto" :value="__('composto')" />
                <x-text-input id="composto" name="composto" type="text" class="mt-1 block w-full" :value="old('composto')" required autofocus autocomplete="composto" />
                <x-input-error class="mt-2" :messages="$errors->get('composto')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="preco" :value="__('Preço de venda:')" />
                <x-text-input id="preco" name="preco" type="number" class="mt-1 block w-full" :value="old('preco')" required autofocus autocomplete="preco" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="validade" :value="__('Valido até:')" />
                <x-text-input id="validade" name="validade" type="date" class="mt-1 block w-full" :value="old('data')" required autofocus autocomplete="off" />
            </div>         
           
        </div>

        <div class="flex justify-end px-3 py-3">
            <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center right-4 bottom-4 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save2" viewBox="0 0 16 16">
                        <path d="M2 1a1  1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                    </svg>
                    Armazenar
                </button>
            </div>

    </form>

</section>