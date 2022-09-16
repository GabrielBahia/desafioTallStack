<div class="max-w-6xl mx-auto">
    <div class="m-2 p-2">
    <h1 class="shadow-lg shadow-violet-800 mt-8 mb-12 py-2 align-middle font-semibold rounded-full text-3xl w-full text-center display:inline-block bg-purple-500">Ranking de times</h1>
        <div>
            <div class="inline-flex mt-2">
                <input type="text" class="block w-52 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Procurar pelo país de origem:" wire:model="searchTermTime" />
            </div> 
            <div class="inline-flex mt-2">
                <button class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900" wire:click.prevent="ordernarPor('score')">
                    Maiores pontuações
                </button>
            </div> 
            <div class="inline-flex mt-4">
                <button class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900" wire:click.prevent="ordernarPor('wins')">
                    Mais vitórias
                </button>
            </div> 
            <div class="inline-flex mt-4 mb-4">
                <button class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900" wire:click.prevent="ordernarPor('losses')">
                    Mais derrotas
                </button>
            </div> 
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Time</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    País</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Pontuação</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Vitórias</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Derrotas</th>
                                <th scope="col" class="px-28 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr></tr>
                            @foreach ($teams as $team)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $team->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $team->nationality }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $team->score }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $team->wins }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $team->losses }}</td>
                                <td class="flex justify-center">
                                    <div class="pt-6 ">
                                        <button @click="view = true" type="button" wire:click.prevent="viewTeam({{ $team->id }})" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                        Visualizar</button>
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
</div>