<div>
    <div class="py-10 bg-slate-600">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

                @if ($noticias->isNotEmpty())
                <div class="p-6 border-b border-gray-300 shadow-md bg-slate-200 dark:bg-gray-800 dark:border-gray-600">
                    <table class="min-w-full bg-slate-200 dark:bg-gray-800">
                        <thead class="bg-emerald-200 dark:bg-emerald-700">
                            <tr>
                                <th
                                    class="px-4 py-2 text-base font-bold text-left border-b border-gray-300 text-slate-900 dark:text-slate-100">
                                    Título
                                </th>
                                <th
                                    class="px-4 py-2 text-base font-bold text-left border-b border-gray-300 text-slate-900 dark:text-slate-100">
                                    Descrição
                                </th>
                                <th
                                    class="px-4 py-2 text-base font-bold text-left border-b border-gray-300 text-slate-900 dark:text-slate-100">
                                    Data de Criação
                                </th>
                                <th class="px-4 py-2 text-center border-b border-gray-300 dark:text-slate-100">
                                    <button @click="createNews = !createNews"
                                        class="px-4 py-2 font-bold text-white bg-blue-500 rounded shadow-md hover:bg-blue-800 focus:outline-none focus:shadow-outline">
                                        Cadastrar Notícia
                                    </button>

                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:bg-slate-800 dark:divide-slate-500">
                            <!-- Loop through your noticias data and populate the rows -->
                            @foreach($noticias as $noticia)
                            <tr
                                class="{{ $loop->index % 2 == 0 ? 'bg-slate-100 dark:bg-gray-800' : 'bg-gray-200 dark:bg-slate-700' }} dark:text-slate-100">
                                <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">
                                    {{ $noticia->titulo }}
                                </td>
                                <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">
                                    {{ $noticia->descricao }}
                                </td>
                                <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">
                                    {{ $noticia->created_at->format('d/m/Y H:i:s') }}
                                </td>
                                <td class="flex items-center p-2 align-middle">
                                    <!-- Action buttons -->
                                    <button
                                        class="inline-block p-2 px-4 text-green-100 transition duration-200 bg-blue-500 rounded-md shadow-md hover:bg-green-100 hover:text-green-700">
                                        {{-- onclick="openModal('{{ route('noticia.show', [$noticia]) }}')">
                                        --}}
                                        <i class="text-sm fas fa-eye"></i>
                                    </button>
                                    {{ $noticia->titulo }}
                                    <button wire:click.live="'edit({{ $noticia->id }})"@click="editNews = !editNews"
                                        class="inline-block p-2 px-4 mx-4 text-white transition duration-200 bg-yellow-500 rounded-md shadow-md hover:bg-yellow-50 hover:text-yellow-500">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>

                                    </button>

                                    <!---------------Formulário-------------->

                                    <div x-show="createNews"
                                        class="fixed inset-0 z-50 flex items-center justify-center overflow-hidden transition duration-500 bg-transparent">
                                        <div>
                                            <x-forms.noticia.create />
                                        </div>
                                    </div>

                                    <div x-show="editNews"
                                        class="fixed inset-0 z-50 flex items-center justify-center transition duration-500 bg-transparent">
                                        <div>
                                            <x-forms.noticia.edit />

                                        </div>
                                    </div>
                                    <!------------------------------------------->

                                    <button wire:click="delete" onclick="return
                                        confirm('Tem certeza que deseja excluir?')"
                                        class="inline-block p-2 text-white transition duration-300 bg-red-500 rounded-md shadow-md hover:bg-red-50 hover:text-red-500">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="p-4 text-center bg-gray-100 border border-gray-200 rounded-md">
                    <p class="text-lg font-extrabold text-gray-600">Este usuário ainda não cadastrou notícias.
                    </p>

                    <button @click="createNews = !createNews"
                        class="px-4 py-2 my-4 font-bold text-white bg-blue-500 rounded shadow-md hover:bg-blue-800 focus:outline-none focus:shadow-outline">
                        Cadastrar Notícia
                    </button>
                </div>

                <div x-show="createNews"
                    class="fixed inset-0 z-50 flex items-center justify-center overflow-hidden transition duration-500 bg-transparent">
                    <div>
                        <x-forms.noticia.create />
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
