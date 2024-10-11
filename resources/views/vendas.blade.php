<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Formulário de Alocação de Produtos</title> -->
    <script src="https://cdn.tailwindcss.com"></script>
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
                                    <x-input-label for="nome" :value="__('Nome Do Cliente:')" />
                                    <x-text-input id="cliente" class="block w-full mr-20" type="text" name="cliente"
                                        :value="old('cliente')" required autofocus autocomplete="cliente" placeholder="Digite o nome de Cliente:" />


                                    <!-- Produto -->

                                    <div class="mb-4">
                                        <x-input-label for="nome" :value="__('Produto:')" />
                                        <div class="mb-4" x-data="dropdown()">
                                            <!-- <label for="assignee" class="block text-sm font-medium text-gray-700 mb-2">Assigned to</label> -->

                                            <div class="relative">
                                                <x-text-input type="text" x-model="query" placeholder="Search..." @focus="open = true" name="produto" id="produto"
                                                    class="block w-full mr-20 text-white focus:border-green-500 focus:ring-green-500 sm:text-sm rounded-md"
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

        // Funcao de pesquisa para medicamentos   
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