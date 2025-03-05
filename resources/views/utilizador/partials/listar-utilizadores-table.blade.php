<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="max-h-64 overflow-y-auto mb-14">
    <table class="min-w-full">
        <thead class="bg-gray-400 ">
            <tr class="">
                <th class="w-1/4 text-left py-3 px-2 uppercase font-semibold text-sm">Nome</th>
                <th class="w-1/4 text-left py-3 px-2 uppercase font-semibold text-sm">Email</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tipo</th>
                <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Estado Da Conta</th>
                <th class="w-1/2 text-left py-3 px-4 pr-8 uppercase font-semibold text-sm">Nivel Acesso</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach($users as $user)
            <tr class="border-b border-y-blue-300 dark:text-white">
                <td class="w-1/3 text-left py-3 px-2">{{$user->name}}</td>
                <td class="w-1/5 text-left py-3 px-2">{{$user->email}}</td>
                <td class="text-left py-3 px-4">{{$user->type}}</td>
                <td class="text-left py-3 px-4">
                    <!-- <button class="text-indigo-600 hover:text-indigo-900 mr-4"><a href="{{ route('profile.update') }}">Editar</a></button> -->

                    @if($user->estado == 'activo')

                    <button class="text-green-500 hover:text-green-700">Conta Ativa</button>

                    @else

                    <button class="text-red-500 hover:text-red-700"> Conta Inativa</button>

                    @endif
                </td>

                <td class="relative px-4 py-3">
                    <div x-data="{ open: false }" class="relative inline-block text-left">
                        <!-- Botão do menu principal -->
                        <button @click="open = !open" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 dark:bg-gray-800 dark:text-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                            Menu
                            <svg class="h-5 w-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Menu principal sobreposto -->
                        <div x-show="open" @click.away="open = false" class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 dark:bg-gray-800 ring-black ring-opacity-5 px-2 py-2 z-50">
                            <!-- Opções principais -->
                            <button onclick="alterarEstado('{{ $user->id }}', '{{ $user->estado }}')" class="block px-4 py-2 text-sm rounded-md w-full text-left 
        {{ $user->estado == 'activo' ? 'text-red-500 hover:bg-gray-100 dark:hover:bg-gray-500' : 'text-green-500 hover:bg-gray-100 dark:hover:bg-gray-500' }}">
                                {{ $user->estado == 'activo' ? 'Revogar Acesso' : 'Permitir Acesso' }}
                            </button>

                            <button onclick="alterarNivel('{{ $user->id }}', '{{ $user->type }}')" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-100 hover:bg-red-100 dark:hover:bg-gray-500 rounded-md w-full text-left">
                                {{ $user->type == 'normal' ? 'Definir como Administrador' : 'Definir como Usuário Normal' }}
                            </button>
                        </div>

                    </div>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <script>
        function alterarEstado(userId, estadoAtual) {
            Swal.fire({
                title: estadoAtual === 'activo' ? 'Revogar acesso?' : 'Permitir acesso?',
                text: estadoAtual === 'activo' ? 'O usuário perderá o acesso.' : 'O usuário terá acesso novamente.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, confirmar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/users/${userId}/alterar-estado`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    }).then(response => {
                        if (!response.ok) {
                            return response.json().then(data => {
                                // Se o status for 400 ou qualquer outro erro
                                Swal.fire('Erro!', data.message, 'error');
                            });
                        }
                        return response.json(); // Caso a resposta seja bem-sucedida
                    }).then(data => {
                        if (data) {
                            Swal.fire('Sucesso!', data.message, 'success').then(() => location.reload());
                        }
                    }).catch(error => {
                        Swal.fire('Erro!', 'Ocorreu um problema, tente novamente.', 'error');
                    });
                }
            });
        }

        function alterarNivel(userId, tipoAtual) {
            Swal.fire({
                title: tipoAtual === 'normal' ? 'Tornar Administrador?' : 'Tornar Usuário Normal?',
                text: tipoAtual === 'normal' ? 'O usuário terá permissões de administrador.' : 'O usuário perderá permissões de administrador.',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, confirmar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/users/${userId}/alterar-nivel`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    }).then(response => {
                        if (!response.ok) {
                            return response.json().then(data => {
                                // Se o status for 400 ou qualquer outro erro
                                Swal.fire('Erro!', data.message, 'error');
                            });
                        }
                        return response.json(); // Caso a resposta seja bem-sucedida
                    }).then(data => {
                        if (data) {
                            Swal.fire('Sucesso!', data.message, 'success').then(() => location.reload());
                        }
                    }).catch(error => {
                        Swal.fire('Erro!', 'Ocorreu um problema, tente novamente.', 'error');
                    });
                }
            });
        }
    </script>

</div>