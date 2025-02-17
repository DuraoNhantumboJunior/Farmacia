<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Formulário de Alocação de Produtos</title> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/componentes.css">
    <style>
        .parent {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            grid-template-rows: 3fr 1fr;
            grid-column-gap: 37px;
            grid-row-gap: 7px;
        }

        .div1 {
            grid-area: 1 / 1 / 2 / 2;
        }

        .div2 {
            grid-area: 1 / 2 / 2 / 3;
        }

        .div3 {
            grid-area: 2 / 1 / 3 / 2;
        }

        .modal {
            display: none;
            /* Ocultar o modal por padrão */
            position: fixed;
            /* Fixar o modal na tela */
            inset: 0;
            /* Cobrir toda a tela */
            background-color: rgba(0, 0, 0, 0.75);
            /* Fundo escuro semi-transparente */
            justify-content: center;
            /* Centralizar o conteúdo */
            align-items: center;
            /* Centralizar o conteúdo verticalmente */
        }

        .modal.show {
            display: flex;
            /* Exibir o modal com flexbox */
        }

        /* metodo de pagamento */

        /* From Uiverse.io by Yaya12085 */
        .radio-inputs {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 350px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .radio-inputs>* {
            margin: 6px;
        }

        .radio-input:checked+.radio-tile {
            border-color: #2260ff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            color: #2260ff;
        }

        .radio-input:checked+.radio-tile:before {
            transform: scale(1);
            opacity: 1;
            background-color: #2260ff;
            border-color: #2260ff;
        }

        .radio-input:checked+.radio-tile .radio-icon svg {
            fill: #2260ff;
        }

        .radio-input:checked+.radio-tile .radio-label {
            color: #2260ff;
        }

        .radio-input:focus+.radio-tile {
            border-color: #2260ff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
        }

        .radio-input:focus+.radio-tile:before {
            transform: scale(1);
            opacity: 1;
        }

        .radio-tile {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 80px;
            min-height: 80px;
            border-radius: 0.5rem;
            border: 2px solid #b5bfd9;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transition: 0.15s ease;
            cursor: pointer;
            position: relative;
        }

        .radio-tile:before {
            content: "";
            position: absolute;
            display: block;
            width: 0.75rem;
            height: 0.75rem;
            border: 2px solid #b5bfd9;
            background-color: #fff;
            border-radius: 50%;
            top: 0.25rem;
            left: 0.25rem;
            opacity: 0;
            transform: scale(0);
            transition: 0.25s ease;
        }

        .radio-tile:hover {
            border-color: #2260ff;
        }

        .radio-tile:hover:before {
            transform: scale(1);
            opacity: 1;
        }

        .radio-icon svg {
            width: 2rem;
            height: 2rem;
            fill: #494949;
        }

        .radio-label {
            color: #707070;
            transition: 0.375s ease;
            text-align: center;
            font-size: 13px;
        }

        .radio-input {
            clip: rect(0 0 0 0);
            -webkit-clip-path: inset(100%);
            clip-path: inset(100%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }
    </style>
</head>

<body class="bg-gray-100">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Vendas') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <div class="parent">
                            <div class="div1">
                                <div class="custemer-data">
                                    <!-- Cliente -->
                                    <!-- <x-input-label for="nome" :value="__('Nome Do Cliente:')" />
                                    <x-text-input id="cliente" class="block w-full mr-20" type="text" name="cliente"
                                        :value="old('cliente')" required autofocus autocomplete="cliente" placeholder="Digite o nome de Cliente:" /> -->


                                    <!-- Produto -->

                                    <div class="mb-4">
                                        <x-input-label for="nome" :value="__('Produto:')" />
                                        <div class="mb-4" x-data="dropdownproduto()">
                                            <!-- <label for="assignee" class="block text-sm font-medium text-gray-700 mb-2">Assigned to</label> -->

                                            <div class="relative">
                                                <x-text-input type="text" x-model="query" placeholder="Search..." @focus="open = true" name="produto" id="produto"
                                                    class="block w-full mr-20 text-gray-900 dark:text-white focus:border-green-500 focus:ring-green-500 sm:text-sm rounded-md"
                                                    @keydown.escape="open = false" @click.outside="open = false" />

                                                <!-- Dropdown options -->
                                                <ul x-show="open" x-transition class="absolute z-10 mt-1 w-full  shadow-lg max-h-60 rounded-md py-1 text-base ring-1 bg-green-100 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                                                    <template x-for="(item, index) in filteredItems" :key="index">
                                                        <li @click="selectItem(item)" class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-green-600 ">
                                                            <span x-text="item" class="block"></span>
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

                                    <!-- Quantidade -->
                                    <div class="mb-4">
                                        <x-input-label for="nome" :value="__('Quantidade:')" />
                                        <x-text-input id="quantidade" class="block w-full mr-20" type="number" name="quantidade"
                                            :value="old('quantidade')" required autofocus autocomplete="qunantidade" placeholder="Digite a quantidade:" />
                                    </div>

                                    <!-- Preço -->
                                    <div class="mb-4">
                                        <x-input-label for="nome" :value="__('Preço: MT')" />
                                        <x-text-input id="preco" step="0.01" class="block w-full mr-20" type="number" name="preco"
                                            :value="old('preco')" required autofocus autocomplete="preco" placeholder="Digite o Preçco:" />
                                    </div>
                                    <!-- Metodo de pagamento  -->
                                    <div class="mb-4">

                                        <div class="radio-inputs">
                                            <label>
                                                <input class="radio-input" type="radio" name="engine">
                                                <span class="radio-tile">
                                                    <span class="radio-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                                            <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z" />
                                                        </svg>
                                                    </span>
                                                    <span class="radio-label">Enumerario</span>
                                                </span>
                                            </label>
                                            <label>
                                                <input checked="" class="radio-input" type="radio" name="engine">
                                                <span class="radio-tile">
                                                    <span class="radio-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0" />
                                                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z" />
                                                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z" />
                                                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567" />
                                                        </svg>
                                                    </span>
                                                    <span class="radio-label">Carteira Movel</span>
                                                </span>
                                            </label>
                                            <label>
                                                <input class="radio-input" type="radio" name="engine">
                                                <span class="radio-tile">
                                                    <span class="radio-icon">
                                                        <svg stroke="currentColor" xml:space="preserve" viewBox="0 0 324.018 324.017" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" id="Capa_1" version="1.1" fill="none">
                                                            <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                                            <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <g>
                                                                    <g>
                                                                        <path d="M317.833,197.111c3.346-11.148,2.455-20.541-2.65-27.945c-9.715-14.064-31.308-15.864-35.43-16.076l-8.077-4.352 l-0.528-0.217c-8.969-2.561-42.745-3.591-47.805-3.733c-7.979-3.936-14.607-7.62-20.475-10.879 c-20.536-11.413-34.107-18.958-72.959-18.958c-47.049,0-85.447,20.395-90.597,23.25c-2.812,0.212-5.297,0.404-7.646,0.59 l-6.455-8.733l7.34,0.774c2.91,0.306,4.267-1.243,3.031-3.459c-1.24-2.216-4.603-4.262-7.519-4.57l-23.951-2.524 c-2.91-0.305-4.267,1.243-3.026,3.459c1.24,2.216,4.603,4.262,7.519,4.57l3.679,0.386l8.166,11.05 c-13.823,1.315-13.823,2.139-13.823,4.371c0,18.331-2.343,22.556-2.832,23.369L0,164.443v19.019l2.248,2.89 c-0.088,2.775,0.823,5.323,2.674,7.431c5.981,6.804,19.713,7.001,21.256,7.001c4.634,0,14.211-2.366,20.78-4.153 c-0.456-0.781-0.927-1.553-1.3-2.392c-0.36-0.809-0.603-1.668-0.885-2.517c-0.811-2.485-1.362-5.096-1.362-7.845 c0-14.074,11.449-25.516,25.515-25.516s25.52,11.446,25.52,25.521c0,6.068-2.221,11.578-5.773,15.964 c-0.753,0.927-1.527,1.828-2.397,2.641c-1.022,0.958-2.089,1.859-3.254,2.641c29.332,0.109,112.164,0.514,168.708,1.771 c-0.828-0.823-1.533-1.771-2.237-2.703c-0.652-0.854-1.222-1.75-1.761-2.688c-2.164-3.744-3.5-8.025-3.5-12.655 c0-14.069,11.454-25.513,25.518-25.513c14.064,0,25.518,11.449,25.518,25.513c0,5.126-1.553,9.875-4.152,13.878 c-0.605,0.922-1.326,1.755-2.04,2.594c-0.782,0.922-1.616,1.781-2.527,2.584c5.209,0.155,9.699,0.232,13.546,0.232 c19.563,0,23.385-1.688,23.861-5.018C324.114,202.108,324.472,199.602,317.833,197.111z"></path>
                                                                        <path d="M52.17,195.175c3.638,5.379,9.794,8.922,16.756,8.922c0.228,0,0.44-0.062,0.663-0.073c2.576-0.083,5.043-0.61,7.291-1.574 c1.574-0.678,2.996-1.6,4.332-2.636c4.782-3.702,7.927-9.429,7.927-15.933c0-11.144-9.066-20.216-20.212-20.216 s-20.213,9.072-20.213,20.216c0,2.263,0.461,4.411,1.149,6.446c0.288,0.85,0.616,1.673,1.015,2.471 C51.279,193.606,51.667,194.434,52.17,195.175z"></path>
                                                                        <path d="M269.755,209.068c2.656,0,5.173-0.549,7.503-1.481c1.589-0.642,3.06-1.491,4.422-2.495 c1.035-0.767,1.988-1.616,2.863-2.559c3.34-3.604,5.432-8.389,5.432-13.681c0-11.144-9.071-20.21-20.215-20.21 s-20.216,9.066-20.216,20.21c0,4.878,1.812,9.3,4.702,12.801c0.818,0.989,1.719,1.89,2.708,2.713 c1.311,1.088,2.729,2.024,4.293,2.755C263.836,208.333,266.704,209.068,269.755,209.068z"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="radio-label">Cartão</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="div2">
                                <!-- Tabela de Produtos Adicionados -->
                                <table class="table-auto w-full border-gray-300 dark:border-gray-700">
                                    <thead>
                                        <tr class="">
                                            <th class="px-4 py-2">Produto</th>
                                            <th class="px-4 py-2">Quantidade</th>
                                            <th class="px-4 py-2">Preço (MT)</th>
                                            <th class="px-4 py-2">Subtotal (MT)</th>
                                            <th class="px-4 py-2">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabela-produtos">
                                        <!-- Produtos adicionados aparecerão aqui -->
                                    </tbody>
                                </table>

                                <!-- Total -->
                                <div id="total" class="text-right mt-4 text-lg font-bold">
                                    Total: 0.00 MT
                                </div>
                            </div>
                            <div class="div3 flex">
                                <div class="flex direction-row m-auto py-2 px-2">
                                    <!-- Botão de Adicionar Produto -->
                                    <button type="button" class="mr-8 flex justify-start bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50" onclick="adicionarProduto()">
                                        Adicionar Produto
                                    </button>

                                    <!-- Botão Finalizar Alocação -->

                                    <button class="flex justify-end bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50" onclick="showModal()" id="finalizarAlocacao" disabled>
                                        Finalizar Alocação
                                    </button>
                                </div>
                            </div>

    </x-app-layout>

    <!-- Modal de Confirmação -->
    <div id="confirmation-modal" class="modal">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-bold mb-4">Confirmação</h3>
            <p class="mb-4">Você tem certeza de que deseja finalizar a alocação? Esta ação não pode ser desfeita.</p>
            <div class="flex justify-end">
                <button onclick="hideModal()" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 mr-4">
                    Cancelar
                </button>
                <button onclick="finalizarAlocacao()" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                    Confirmar
                </button>
            </div>
        </div>
    </div>
    </div>
    <script>
        let produtos = [];

        // Função para adicionar produto
        function adicionarProduto() {
            const produto = document.getElementById('produto').value;
            const quantidade = document.getElementById('quantidade').value;
            const preco = document.getElementById('preco').value;

            if (produto && quantidade && preco) {
                produtos.push({
                    produto,
                    quantidade,
                    preco
                });
                atualizarTabelaProdutos();
                limparCampos();
                desativarCampoCliente();
                activarBotaoFinalizarAlocacao();
            } else {
                alert('Preencha todos os campos do produto.');
            }
        }

        // Função para atualizar a tabela e calcular o total
        function atualizarTabelaProdutos() {
            const tabela = document.getElementById('tabela-produtos');
            tabela.innerHTML = '';

            let total = 0;

            produtos.forEach((item, index) => {
                const subtotal = (item.quantidade * item.preco).toFixed(2);
                total += parseFloat(subtotal);
                total = total;
                tabela.innerHTML += `
                    <tr>
                        <td class="border px-4 py-2">${item.produto}</td>
                        <td class="border px-4 py-2">${item.quantidade}</td>
                        <td class="border px-4 py-2">Mt ${item.preco}</td>
                        <td class="border px-4 py-2">MT ${subtotal}</td>
                        <td class="border px-4 py-2">
                             <button class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" onclick="removerProduto(${index})">Remover</button>
                        </td>
                    </tr>
                `;
            });

            total = total + (total * .16);
            // Atualizar o valor total
            document.getElementById('total').textContent = `Total + IVA 16% : ${total.toFixed(2)} MT `;

        }

        // Função para remover produto
        function removerProduto(index) {
            produtos.splice(index, 1);
            atualizarTabelaProdutos();

            // Reativar o campo cliente se todos os produtos forem removidos
            if (produtos.length === 0) {
                ativarCampoCliente();
                DesativarBotaoFinalizarAlocacao();
            }

        }

        function limparCampos() {
            document.getElementById('produto').value = '';
            document.getElementById('quantidade').value = '';
            document.getElementById('preco').value = '';
        }

        // Funcao de pesquisa para produtos   
        function dropdown() {
            return {
                open: false,
                query: '',
                items: [
                    'Leslie Alexander',
                    'Michael Foster',
                    'Dries Vincent',
                    'Lindsay Walton',
                    'Courtney Henry',
                    'Tom Cook',
                    'Whitney Francis'
                ],
                get filteredItems() {
                    if (this.query === '') {
                        return this.items;
                    }
                    return this.items.filter(item => item.toLowerCase().includes(this.query.toLowerCase()));
                },
                selectItem(item) {
                    this.query = item;
                    this.open = false;
                }
            }
        }

        // Função para desativar o campo do cliente
        function desativarCampoCliente() {
            document.getElementById('cliente').setAttribute('disabled', true);
        }

        // FUnção para Desativar o botão finalizarAlocação
        function DesativarBotaoFinalizarAlocacao() {
            const alocacao = document.getElementById('finalizarAlocacao');
            alocacao.disabled = true;
        }

        // Função para reativar o campo do cliente
        function ativarCampoCliente() {
            document.getElementById('cliente').removeAttribute('disabled');
        }

        // FUnção para reativar o botão finalizarAlocação
        function activarBotaoFinalizarAlocacao() {
            const alocacao = document.getElementById('finalizarAlocacao');
            alocacao.disabled = false;
        }

        function showModal() {
            document.getElementById('confirmation-modal').classList.add('show');
        }

        function hideModal() {
            document.getElementById('confirmation-modal').classList.remove('show');
        }

        function finalizarAlocacao() {
            const nomeCampo = document.getElementById('cliente');
            // Lógica para finalizar a alocação, como enviar um formulário ou fazer uma requisição AJAX
            hideModal(); // Fechar o modal após confirmar
            limparTabela();
            nomeCampo.value = '';

        }

        function limparTabela() {
            const tabela = document.getElementById('tabela-produtos');
            tabela.innerHTML = ''; // Limpa todas as linhas da tabela
        }
    </script>
</body>

</html>
@foreach($produtos as $produto)
<script>
    function dropdownproduto() {
        return {
            open: false,
            query: '',
            items: [
                @foreach($produtos as $produto) {

                    id: '{{ $produto->id }}',
                    nome: '{{ $produto->medicamento->nome }}',
                    preco: '{{ $produto->preco_por_cartela }}'
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
                this.query = item.nome; // Preenche o input com o nome do produto
                this.open = false;

                // Preencher os campos com os dados do produto selecionado
                document.getElementById('preco').value = item.preco;
                document.getElementById('medida').value = item.medida;
                document.getElementById('produto_id').value = item.id;
            }
        }
    }
</script>
@endforeach