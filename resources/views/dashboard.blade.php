@if($auth == 'Master')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Link da CDN do Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<x-app-layout>
    <x-slot name="header" class="flex row-span-1">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight justify-start">
            | {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 justify-center gap-6 md:grid-cols-2 xl:grid-cols-4 2xl:gap-8">
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-lg transition-transform transform hover:-translate-y-1 hover:shadow-2xl dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule w-6 h-6 text-red-500 dark:text-red-300" viewBox="0 0 16 16">
                            <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429z" />
                        </svg>
                    </div>
                    <a href="medicamentos" id="salasButton" class="mt-6 block text-base leading-7 text-gray-700 font-bold dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400">
                        Medicamentos
                    </a>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Medicamentos</p>
                    <span class="mt-2 inline-block text-sm font-medium text-sky-500 hover:text-sky-600 dark:text-blue-400">{{$medicamentos}}</span>
                    <!-- Menu "Salas" -->
                </div>
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-lg transition-transform transform hover:-translate-y-1 hover:shadow-2xl dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck w-6 h-6 " viewBox="0 0 16 16">
                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                        </svg>
                    </div>
                    <a href="/fornecedores" id="salasButton" class="mt-6 block text-base leading-7 text-gray-700 font-bold dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400">
                        Fornecedores
                    </a>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Fornecedores</p>
                    <span class="mt-2 inline-block text-sm font-medium text-sky-500 hover:text-sky-600 dark:text-blue-400">{{$fornecedores}}</span>
                    <!-- Menu "Salas" -->
                </div>
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-lg transition-transform transform hover:-translate-y-1 hover:shadow-2xl dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin w-6 h-6 text-green-500 dark:text-green-300" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0" />
                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z" />
                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z" />
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567" />
                        </svg>
                    </div>
                    <a href="/stock" id="salasButton" class="mt-6 block text-base leading-7 text-gray-700 font-bold dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400">
                        Stock
                    </a>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Produtos Disponiveis </p>
                    <span class="mt-2 inline-block text-sm font-medium text-sky-500 hover:text-sky-600 dark:text-blue-400">{{$stock}}</span>
                    <!-- Menu "Salas" -->
                </div>
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-lg transition-transform transform hover:-translate-y-1 hover:shadow-2xl dark:border-gray-700 dark:bg-gray-800 ">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-500 dark:text-blue-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6.75a3 3 0 11-6 0 3 3 0 016 0zm4.5 13.5a6 6 0 00-12 0M12 7.5v.008h.008V7.5H12z" />
                        </svg>
                    </div>
                    <a href="utilizador" id="salasButton" class="mt-6 block text-base leading-7 text-gray-700 font-bold dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400">
                        Utilizadores
                    </a>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Controle de actividades</p>
                    <span class="mt-2 inline-block text-sm font-medium text-sky-500 hover:text-sky-600 dark:text-blue-400">{{$users}}</span>
                    <!-- Menu "Salas" -->
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{-- Tentativa de colocar um grafico porem nao esta funcionar --}}
        <div class="my-10 flex justify-center">
            <canvas class="w-full max-w-5xl max-h-72 " id="myChart"></canvas>
        </div>

        <script>
            var vendasAcumuladas = @json($vendasAcumuladas);
            // Obtém o elemento de canvas pelo ID
            var ctx = document.getElementById('myChart').getContext('2d');

            // Criação do gráfico usando Chart.js
            // Defina as cores com base no tema (exemplo: claro ou escuro)
            const temaEscuro = true; // Altere para `false` para o tema claro

            const corTexto = temaEscuro ? 'green' : 'black';
            const corGrade = temaEscuro ? 'rgba(188, 255, 255,.4)' : 'rgba(0, 0, 0, 0.1)';
            const corFundo = temaEscuro ? 'rgba(0, 111, 179, 0.8)' : 'rgba(0, 111, 179, 0.4)';
            const corBorda = temaEscuro ? 'rgba(0, 111, 179, 1)' : 'rgba(0, 23, 76, 1)';

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    datasets: [{
                        label: 'Vendas Por Mês',
                        data: vendasAcumuladas,
                        backgroundColor: corFundo,
                        borderColor: corBorda,
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            ticks: {
                                color: corTexto // Cor do texto dos meses
                            },
                            grid: {
                                color: corGrade // Cor da grade do eixo X
                            }
                        },
                        y: {
                            ticks: {
                                color: corTexto // Cor dos números do eixo Y
                            },
                            grid: {
                                color: corGrade // Cor da grade do eixo Y
                            }
                        }
                    }
                }
            });
        </script>


</x-app-layout>

@else
<script>
    window.location.href = 'vendas';
</script>
@endif