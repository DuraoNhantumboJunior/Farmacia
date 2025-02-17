<div class="relative overflow-x-auto">
    <div class="mb-4">
        <input type="text" id="searchInput" placeholder="Pesquisar Medicamentos..." class="border border-gray-300 rounded py-2 px-4 w-full" />
    </div>
    <div class="max-h-64 overflow-y-auto">
        <table class="min-w-full w-full">
            <thead class="bg-gray-400 text-white sticky top-0">
                <tr>
                    <th class="px-10 py-3 text-left text-xs font-medium uppercase tracking-wider">Nome</th>
                    <th class="px-15 py-3 text-left text-xs font-medium uppercase tracking-wider">Designação</th>
                    <th class="px-15 py-3 text-left text-xs font-medium uppercase tracking-wider">Unidade de medida</th>
                    <th class="px-15 py-3 text-left text-xs font-medium uppercase tracking-wider">Operações</th>
                </tr>
            </thead>
            <tbody id="medicamentoTable" class="bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                @foreach($medicamentos as $medicamento)
                <tr class="border-t">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{$medicamento->nome}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$medicamento->designacao}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$medicamento->unidade_medida}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <a href="actualizar-medicamento/{{$medicamento->id}}">
                            <button class="text-emerald-500 hover:text-emerald-300 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </button>
                        </a>
                        <a href="">
                            <button class="ml-8 text-red-400 hover:text-rose-500">
                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z" />
                                    <path d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z" />
                                    <path d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z" />
                                    <path d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.97559 13.4157C7.00371 13.4157 7.00371 13.4157 7.03182 13.4157C7.39745 13.3875 7.65059 13.0782 7.62245 12.7407L7.45367 10.2657C7.42559 9.90004 7.1142 9.64692 6.72245 9.67504Z" />
                                </svg>
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sem Nenhum Medicamento!</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Botão de adicionar -->
    <a href="registar-medicamento" class=" pt-12">
        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 mt-6 rounded flex items-center absolute right-4 bottom-4 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus mr-2" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>
            Adicionar Medicamentos
        </button>
    </a>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#medicamentoTable tr');

        rows.forEach(row => {
            const cells = row.getElementsByTagName('td');
            let match = false;

            for (let i = 0; i < cells.length - 1; i++) { // Exclui a última célula que contém o botão
                if (cells[i].textContent.toLowerCase().indexOf(filter) > -1) {
                    match = true;
                    break;
                }
            }

            if (match) {
                row.style.display = ''; // Mostra a linha
            } else {
                row.style.display = 'none'; // Oculta a linha
            }
        });
    });
</script>
