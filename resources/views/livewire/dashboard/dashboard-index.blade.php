<div x-data="{ view: @entangle('showView')}" class="max-w-6xl mx-auto">
    @include('livewire.dashboard.dashboard-view')
    <h1 class="shadow-lg shadow-violet-800 mt-8 mb-12 py-2 align-middle font-semibold rounded-full text-3xl w-full text-center display:inline-block bg-purple-500">Campeonatos</h1>
    <div class="m-2 p-2">
        <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class=" shadow-2xl overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-violet-500 dark:bg-gray-600 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-large text-black dark:text-gray-200 uppercase tracking-wider">
                                    Campeonato</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-large text-black dark:text-gray-200 uppercase tracking-wider">
                                    Jogo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-large text-black dark:text-gray-200 uppercase tracking-wider">
                                    Data de início</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-large text-black dark:text-gray-200 uppercase tracking-wider">
                                    Data de encerramento</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-large text-black dark:text-gray-200 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-violet-400 divide-y divide-gray-200">
                            <tr></tr>
                            @foreach ($championships as $championship)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $championship->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $championship->game }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $championship->start_date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $championship->finish_date }}</td>
                                <td class="flex justify-center">
                                    <div class="pt-6 ">
                                        <button @click="view = true" type="button" wire:click.prevent="viewChampionship({{ $championship->id }})" class="focus:outline-none text-black bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:ring-purple-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div x-show="!view"></div>
</div>