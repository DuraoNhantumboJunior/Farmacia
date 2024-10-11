<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __(' Registar Medicamento') }}
        </h2>

    </header>

    <form method="post" action="{{ route('armazenar.medicamento') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div class="flex flex-wrap -mx-3">
            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="name" :value="__('Nome:')" />
                <x-text-input id="medicamento" name="medicamento" type="text" class="mt-1 block w-full" :value="old('medicamento')" required autofocus autocomplete="medicamento" />
                <x-input-error class="mt-2" :messages="$errors->get('medicamento')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="apresentacao" :value="__('Apresentação:')" />
                <x-text-input id="apresentacao" name="apresentacao" type="text" class="mt-1 block w-full" :value="old('apresentacao')" required autocomplete="apresentacao"  />
                <x-input-error class="mt-2" :messages="$errors->get('apresentacao')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="medida" :value="__('Unidade de Medida:')" />
                <x-text-input id="medida" name="medida" type="text" class="mt-1 block w-full read-only:true" :value="old('medida')" required autofocus autocomplete="medida"  />
                <x-input-error class="mt-2" :messages="$errors->get('medida')" />
            </div>

        </div>

        <div class="flex justify-end px-3 py-3">
            <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center right-4 bottom-4 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                </svg>
                Registar Medicamento
            </button>
        </div>

    </form>

</section>