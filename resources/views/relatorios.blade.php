<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Formulário de Alocação de Produtos</title> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        .highcharts-description {
            margin: 0.3rem 10px;
        }
    </style>

</head>

<body class="">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Modelos de Relatórios') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                        <figure class="highcharts-figure">
                            <div id="container"></div>
                            <p class="highcharts-description">
                                Actualização de vendas em tempo real
                            </p>
                        </figure>

                        <div class="flex justify-center space-x-4 my-4">
                            <button class="px-4 py-2 bg-blue-500 text-white rounded" onclick="atualizarGrafico('diario')">Diário</button>
                            <button class="px-4 py-2 bg-green-500 text-white rounded" onclick="atualizarGrafico('semanal')">Semanal</button>
                            <button class="px-4 py-2 bg-purple-500 text-white rounded" onclick="atualizarGrafico('mensal')">Mensal</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </x-app-layout>
    <script>
        let periodoSelecionado = 'diario'; // Padrão: Últimas 24h

        // Simula dados de vendas para diferentes períodos
        function gerarDados(periodo) {
            const agora = new Date().getTime();
            const dados = [];
            let intervalo, qtdPontos;

            if (periodo === 'diario') {
                intervalo = 3600 * 1000; // 1 hora
                qtdPontos = 24;
            } else if (periodo === 'semanal') {
                intervalo = 24 * 3600 * 1000; // 1 dia
                qtdPontos = 7;
            } else if (periodo === 'mensal') {
                intervalo = 24 * 3600 * 1000; // 1 dia
                qtdPontos = 30;
            }

            for (let i = -qtdPontos; i <= 0; i++) {
                dados.push({
                    x: agora + i * intervalo,
                    y: Math.floor(Math.random() * 50) + 1 // Simula vendas entre 1 e 50
                });
            }
            return dados;
        }

        function criarGrafico(periodo) {
            Highcharts.chart('container', {
                chart: {
                    type: 'spline'
                },
                time: {
                    useUTC: false
                },
                title: {
                    text: `Vendas ${periodo === 'diario' ? 'Diárias' : periodo === 'semanal' ? 'Semanais' : 'Mensais'}`
                },
                xAxis: {
                    type: 'datetime',
                    title: {
                        text: periodo === 'diario' ? 'Horas' : 'Dias'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Número de Vendas'
                    },
                    min: 0
                },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br/>',
                    pointFormat: '{point.x:%d/%m %H:%M} - {point.y} vendas'
                },
                legend: {
                    enabled: false
                },
                exporting: {
                    enabled: true
                },
                series: [{
                    name: 'Vendas',
                    lineWidth: 2,
                    color: '#28a745',
                    data: gerarDados(periodo)
                }]
            });
        }

        function atualizarGrafico(novoPeriodo) {
            periodoSelecionado = novoPeriodo;
            criarGrafico(novoPeriodo);
        }

        // Cria o gráfico inicial (diário)
        criarGrafico(periodoSelecionado);
    </script>



</body>

</html>