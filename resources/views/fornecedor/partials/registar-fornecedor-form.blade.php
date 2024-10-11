<form action="">
    <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7  ">Dados do Fornecedor</h2>
        <p class="mt-1 text-sm leading-6 text-red-700  ">Os fornecedores são adicionados uma única fez no sistema.</p>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <x-input-label for="nome" :value="__('Nome do Fornecedor:')" />
                <div class="mt-2">
                    <x-text-input id="fornecedor" class="block w-full mr-20" type="text" name="fornecedor"
                        :value="old('fornecedor')" required autofocus autocomplete="fornecedor" placeholder="Selecione o Fornecedor:" />
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium leading-6  ">NUIT</label>
                <div class="mt-2">
                    <x-text-input id="nuit" class="block w-full mr-20" type="text" name="nuit"
                        :value="old('nuit')" required autofocus autocomplete="off" placeholder="Número de Identificação Tributária" />
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="email" class="block text-sm font-medium leading-6  ">Email address</label>
                <div class="mt-2">
                    <x-text-input id="email" class="block w-full mr-20" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="" placeholder="ex: fornecedor@remedios.com" />
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="" class="block text-sm font-medium leading-6  ">Contacto:</label>
                <div class="mt-2">
                    <x-text-input id="tell-fornecedor" class="block w-full mr-20" type="number" name="tell"
                        :value="old('tell-fornecedor')" required autofocus autocomplete="" placeholder="Contacto do fornecedor" />
                </div>
            </div>
            <div class="sm:col-span-3">
                <x-input-label for="endereco" :value="__('Endereço:')" />
                <x-text-input id="endereco" name="endereco" type="text" class="mt-1 block w-full" :value="old('endereco')" required autofocus autocomplete="nuit" />
                <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
            </div>
        </div>
    </div>

    <div class="flex justify-end">
        <button class="bg-green-400 inline-flex items-center px-4 py-2 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            Registar Fornecedor
        </button>
    </div>
</form>