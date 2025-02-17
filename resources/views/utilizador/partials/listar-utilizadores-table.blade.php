<div class="relative overflow-x-auto justify-between">
    <table class="min-w-full">
        <thead class="bg-gray-400 ">
            <tr class="">
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tipo</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Estado</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Operação</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach($users as $user)
            <tr class="border-b border-y-blue-300 dark:text-white">
                <td class="w-1/3 text-left py-3 px-4">{{$user->name}}</td>
                <td class="w-1/3 text-left py-3 px-4">{{$user->email}}</td>
                <td class="text-left py-3 px-4">{{$user->type}}</td>
                @if($user->estado == 'activo')
                <td class="text-left py-3 px-4 text-green-400">Activo</td>
                @else
                <td class="text-left py-3 px-4 text-red-600"> Desativo</td>
                @endif
                <td class="text-left py-3 px-4">
                    <button class="text-indigo-600 hover:text-indigo-900 mr-4"><a href="{{ route('profile.update') }}">Editar</a></button>

                    <form action="{{ route('utilizador') }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        
                        @if($user->estado == 'activo')

                        <button class="text-red-600 hover:text-red-900">Desativar</button>

                        @else

                        <button class="text-green-600 hover:text-green-900">Activar</button>

                        @endif

                    </form>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <!-- Botão de adicionar -->
    <a href="register">
        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center absolute right-4 bottom-4 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus mr-2" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>
            Adicionar Utilizadores
        </button>
    </a>
</div>