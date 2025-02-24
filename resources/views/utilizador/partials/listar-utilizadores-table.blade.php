<div class="max-h-64 overflow-y-auto mb-14">
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
                <td class="text-left py-3 px-4 text-green-400"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lightbulb-fill" viewBox="0 0 16 16">
                        <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5" />
                    </svg></td>
                @else
                <td class="text-center py-3 px-4 text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lightbulb" viewBox="0 0 16 16">
                        <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1" />
                    </svg>
                </td>

                @endif
                <td class="text-left py-3 px-4">
                    <!-- <button class="text-indigo-600 hover:text-indigo-900 mr-4"><a href="{{ route('profile.update') }}">Editar</a></button> -->

                    <form action="{{ route('utilizador') }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')

                        @if($user->estado == 'activo')

                        <button class="text-red-600 hover:text-red-900"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                                <path d="M11 4a4 4 0 0 1 0 8H8a5 5 0 0 0 2-4 5 5 0 0 0-2-4zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8M0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5" />
                            </svg></button>

                        @else

                        <button class="text-green-600 hover:text-green-900"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                                <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8" />
                            </svg></button>

                        @endif

                    </form>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <!-- Botão de adicionar -->
    <!-- <a href="register" class=" pt-12 ">
        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 mt-6 rounded flex items-center absolute right-4 bottom-4 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus mr-2" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>
            Adicionar Utilizadores
        </button>
    </a> -->
</div>