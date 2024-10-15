@if(session('success'))
    <div x-data="{ show: true }" x-show="show" class="fixed top-5 right-5 bg-green-500 text-white py-2 px-4 rounded-lg shadow-lg"
         x-init="setTimeout(() => show = false, 5000)">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div x-data="{ show: true }" x-show="show" class="fixed top-5 right-5 bg-red-500 text-white py-2 px-4 rounded-lg shadow-lg"
         x-init="setTimeout(() => show = false, 5000)">
        {{ session('error') }}
    </div>
@endif



<form method="post" action="{{ route('armazenar.stock') }}" class="mt-6 space-y-6">
    @csrf
    @method('post')

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-5xl">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                Informações do Fornecedor
            </h2>

            <div class="flex flex-wrap -mx-3 ">
                <div class="mb-4 w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="nome" :value="__('Nome:')" />
                    <div class="mb-4" x-data="dropdownFornecedor()">
                        <div class="relative">
                            <x-text-input type="text" x-model="query" placeholder="Pesquisar..." @focus="open = true" name="produto" id="produto"
                                class="block w-full mr-20 dark:text-white text-black focus:border-green-500 focus:ring-green-500 sm:text-sm rounded-md"
                                @keydown.escape="open = false" @click.outside="open = false" autocomplete="off"/>

                            <!-- Dropdown options -->
                            <ul x-show="open" x-transition class="absolute z-10 mt-1 w-full shadow-lg max-h-60 rounded-md py-1 text-base ring-1 bg-green-100 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                                <template x-for="(item, index) in filteredItems" :key="index">
                                    <li @click="selectItem(item)" class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-green-600 ">
                                        <span x-text="item.nome" class="block"></span>
                                    </li>
                                </template>

                                <!-- Caso não encontre correspondências -->
                                <li x-show="filteredItems.length === 0" class="select-none relative py-2 pl-3 pr-9">
                                    Não Encontrado!
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <x-text-input id="fornecedor_id" name="fornecedor_id" type="number" :value="old('fornecedor_id')" class="hidden"></x-text-input>

                <div class="w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="email" :value="__('Email:')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="email" readonly />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                <div class="w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="cell" :value="__('Contacto:')" />
                    <x-text-input id="cell" name="cell" type="text" class="mt-1 block w-full" :value="old('cell')" required autocomplete="" readonly />
                    <x-input-error class="mt-2" :messages="$errors->get('cell')" />
                </div>

                <div class="w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="nuit" :value="__('NUIT')" />
                    <x-text-input id="nuit" name="nuit" type="text" class="mt-1 block w-full" :value="old('nuit')" required autocomplete="nuit" readonly />
                    <x-input-error class="mt-2" :messages="$errors->get('nuit')" />
                </div>

                <div class="w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="endereco" :value="__('Endereço:')" />
                    <x-text-input id="endereco" name="endereco" type="text" class="mt-1 block w-full" :value="old('endereco')" required autocomplete="endereco" readonly />
                    <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
                </div>
            </div>

        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-6">
        <div class="max-w-6xl">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                Medicamento
            </h2>

            <div class="flex flex-wrap -mx-3">
                <div class="mb-4 w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="medicamento" :value="__('Nome:')" />
                    <div class="mb-4" x-data="dropdownMedicamento()">
                        <!-- <label for="assignee" class="block text-sm font-medium text-gray-700 mb-2">Assigned to</label> -->

                        <div class="relative">
                            <x-text-input type="text" x-model="query" placeholder="Pesquisar..." @focus="open = true" name="medicamento" id="medicamento"
                                class="block w-full mr-20 dark:text-white text-black focus:border-green-500 focus:ring-green-500 sm:text-sm rounded-md"
                                @keydown.escape="open = false" @click.outside="open = false" />


                            <!-- Dropdown options -->
                            <ul x-show="open" x-transition class="absolute z-10 mt-1 w-full  shadow-lg max-h-60 rounded-md py-1 text-base ring-1 bg-green-100 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                                <template x-for="(item, index) in filteredItems" :key="index">
                                    <li @click="selectItem(item)" class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-green-600 ">
                                        <span x-text="open ? item.nome + ' - ' + item.apresentacao : item.nome" " class="block"></span>
                                    </li>
                                </template>

                                <!-- Caso não encontre correspondências -->
                                <li x-show="filteredItems.length === 0" class=" select-none relative py-2 pl-3 pr-9">
                                    Não Encontrado!
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <x-text-input id="medicamento_id" name="medicamento_id" type="number" :value="old('medicamento_id')" class="hidden"></x-text-input>

                <div class="w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="apresentacao" :value="__('Apresentação:')" />
                    <x-text-input id="apresentacao" name="apresentacao" type="text" class="mt-1 block w-full" :value="old('apresentacao')" required autocomplete="apresentacao" readonly />
                    <x-input-error class="mt-2" :messages="$errors->get('apresentacao')" />
                </div>

                <div class="w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="composto" :value="__('Composto:')" />
                    <x-text-input id="composicao_unit" name="composicao_unit" type="number" class="mt-1 block w-full" :value="old('composicao_unit')" required autofocus autocomplete="composicao_unit" placeholder="peso ou volume do medicamento ex: 500 mg"/>
                    <x-input-error class="mt-2" :messages="$errors->get('composicao_unit')" />
                </div>

                <div class="w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="medida" :value="__('Unidade de Medida:')" />
                    <x-text-input id="medida" name="medida" type="text" class="mt-1 block w-full" :value="old('medida')" required autofocus autocomplete="medida" readonly />
                    <x-input-error class="mt-2" :messages="$errors->get('medida')" />
                </div>


                <div class="w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="comprimidos_por_cartela" :value="__('Comprimidos por Cartela:')" />
                    <x-text-input id="comprimidos_por_cartela" name="comprimidos_por_cartela" type="number" class="mt-1 block w-full" :value="old('comprimidos_por_cartela')" required autofocus autocomplete="off" placeholder="Número de comprimidos em uma única cartela." />
                </div>

                <div class="w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="Quantidade" :value="__('Quantidade de Cartelas:')" />
                    <x-text-input id="numero_de_cartelas" name="numero_de_cartelas" type="number" class="mt-1 block w-full" :value="old('numero_de_cartelas')" required autofocus autocomplete="off" placeholder="O número de de cartelas " />
                    <x-input-error class="mt-2" :messages="$errors->get('quantidade')" />
                </div>

                

                <div class="w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="preco" :value="__('Preço de venda:')" />
                    <x-text-input id="preco" name="preco" type="number" class="mt-1 block w-full" :value="old('preco')" required autofocus autocomplete="off" placeholder="Preço de venda por cartela" />
                </div>

                <div class="w-full sm:w-1/2 px-3 py-3">
                    <x-input-label for="validade" :value="__('Válido até:')" />
                    <x-text-input id="validade" name="validade" type="date" class="mt-1 block w-full" :value="old('validade')" required autofocus autocomplete="off" />
                </div>
            </div>

            <div class="flex justify-end px-3 py-3">
                <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save2" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                    </svg>
                    Armazenar
                </button>
            </div>
        </div>
    </div>
</form>

@foreach($medicamentos as $medicamento)
<script>
    function dropdownMedicamento() {
        return {
            open: false,
            query: '',
            items: [
                @foreach($medicamentos as $medicamento) {
                    id: '{{ $medicamento->id }}',
                    nome: '{{ $medicamento->Nome }}',
                    apresentacao: '{{ $medicamento->Apresentacao }}',
                    medida: '{{ $medicamento->unidade_medida }}'
                },
                @endforeach
            ],
            get filteredItems() {
                if (this.query === '') {
                    return this.items;
                }
                return this.items.filter(item => item.nome.toLowerCase().includes(this.query.toLowerCase()));
            },
            selectItem(item) {
                this.query = item.nome; // Preenche o input com o nome do medicamento
                this.open = false;

                // Preencher os campos com os dados do medicamento selecionado
                document.getElementById('apresentacao').value = item.apresentacao;
                document.getElementById('medida').value = item.medida;
                document.getElementById('medicamento_id').value = item.id;
            }
        }
    }
</script>
@endforeach



@foreach($fornecedores as $fornecedor)
<script>
    function dropdownFornecedor() {
        return {
            open: false,
            query: '',
            items: [{
                id: '{{ $fornecedor->id }}',
                nome: '{{ $fornecedor->nome }}',
                email: '{{ $fornecedor->email }}',
                contacto: '{{ $fornecedor->telefone }}',
                nuit: '{{ $fornecedor->nuit }}',
                endereco: '{{ $fornecedor->endereco }}'
            }],
            get filteredItems() {
                if (this.query === '') {
                    return this.items;
                }
                return this.items.filter(item => item.nome.toLowerCase().includes(this.query.toLowerCase()));
            },
            selectItem(item) {
                this.query = item.nome;
                this.open = false;

                // Preencher os campos com os dados do fornecedor selecionado
                document.getElementById('email').value = item.email;
                document.getElementById('cell').value = item.contacto;
                document.getElementById('nuit').value = item.nuit;
                document.getElementById('endereco').value = item.endereco;
                document.getElementById('fornecedor_id').value=item.id;
            }
        }
    }
</script>
@endforeach