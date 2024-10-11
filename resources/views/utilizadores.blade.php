<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Formulário de Alocação de Produtos</title> -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Painel de Controle->Lista de Utilizadores') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6   dark:text-gray-100">
                        <div class="max-w-6xl mx-auto p-6">
                            <div class=" shadow-md rounded-lg p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <h2 class="text-xl font-semibold">Users</h2>
                                        <p class=" text-white">Esta lista é vista apenas pelo/os Administrador/res</p>
                                    </div>
                                    <button class="bg-blue-500  px-4 py-2 rounded-md">Adicionar Utilizadores</button>
                                </div>

                                <div class="overflow-x-auto">
                                    <table class="min-w-full table-auto">
                                        <thead class="">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-medium  text-green-300 uppercase tracking-wider">Nome</th>
                                                
                                                <th class="px-6 py-3 text-left text-xs font-medium  text-green-300 uppercase tracking-wider">Email</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium  text-green-300 uppercase tracking-wider">Nivel de acesso</th>
                                                <th class="px-6 py-3 text-right text-xs font-medium  text-green-300 uppercase tracking-wider">Acção</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium  text-white">Lindsay Walton</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-white">lindsay.walton@example.com</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-white">Member</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium  text-white">Courtney Henry</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-white">courtney.henry@example.com</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-white">Admin</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium  text-white">Tom Cook</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-white">tom.cook@example.com</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-white">Member</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium  text-white">Whitney Francis</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-white">whitney.francis@example.com</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-white">Admin</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium  text-white">Leonard Krasner</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-white">leonard.krasner@example.com</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-white">Owner</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium  text-white">Floyd Miles</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-white">floyd.miles@example.com</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm  text-white">Member</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </x-app-layout>
</body>

</html>