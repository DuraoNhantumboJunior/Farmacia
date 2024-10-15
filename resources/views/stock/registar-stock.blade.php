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
        {{ __('Estoque de Medicamentos') }}
      </h2>
    </x-slot>


    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @include('stock.partials.registar-stock-form')
      </div>
    </div>

  </x-app-layout>
</body>