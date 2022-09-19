<div x-show.transition.duration.500ms="view" wire:ignore.self x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" class="modal absolute right-0 left-0 w-full h-full flex items-center justify-center" style="background-color: rgba(0,0,0,.5);">

    <div class="text-left bg-white lg:p-14 lg:px-52 shadow-xl rounded-lg mx-2 md:mx-0 h-screen w-screen justify-center">
        <div class="">
            <div class="flex justify-end">
                <!-- Modal Close -->
                <button class="row-end-5" @click="view = false">
                    <svg class="w-4 tex-gray-700 fill-current transition duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001">
                        <path d="M284.286 256.002L506.143 34.144c7.811-7.811 7.811-20.475 0-28.285-7.811-7.81-20.475-7.811-28.285 0L256 227.717 34.143 5.859c-7.811-7.811-20.475-7.811-28.285 0-7.81 7.811-7.811 20.475 0 28.285l221.857 221.857L5.858 477.859c-7.811 7.811-7.811 20.475 0 28.285a19.938 19.938 0 0014.143 5.857 19.94 19.94 0 0014.143-5.857L256 284.287l221.857 221.857c3.905 3.905 9.024 5.857 14.143 5.857s10.237-1.952 14.143-5.857c7.811-7.811 7.811-20.475 0-28.285L284.286 256.002z" />
                    </svg>
                </button>
                <!-- Modal Close -->
            </div>
            <div class="flex justify-center items-center">
                <div class="text-2xl mb-14">Visualizar Campeonato</div>
            </div>
        </div>
        <div class="flex justify-center">

            <div class="flex flex-row">
                <div class="mr-2">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                    <div class="mt-1">
                        <input readonly type="text" id="name" wire:model="name" name="name" class="block appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>
                <div class="mr-2">
                    <label for="game" class="block text-sm font-medium text-gray-700">Jogo</label>
                    <div class="mt-1">
                        <input readonly type="text" id="game" wire:model="game" name="game" class="block appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
            </div>


            <div class="flex flex-row">
                <div class="mr-2">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Data de início</label>
                    <div class="mt-1">
                        <input readonly type="date" id="start_date" wire:model="start_date" name="start_date" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
                <div class="mr-2">
                    <label for="finish_date" class="block text-sm font-medium text-gray-700">Data de encerramento</label>
                    <div class="mt-1">
                        <input readonly type="date" id="finish_date" wire:model="finish_date" name="finish_date" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
            </div>


        </div>
        <div class="flex justify-center mt-12">
            <label for="team_id" class="text-2xl block font-medium text-gray-700">Times participantes</label>
        </div>
        <div class="inline-flex mt-12">
            <button class="focus:outline-none text-black bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:ring-purple-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900" wire:click.prevent="filtro('score')">
                Maiores pontuações
            </button>
        </div>
        <div class="flex justify-center mt-8">

            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-violet-500 dark:bg-gray-600 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left font-large text-black dark:text-gray-200 uppercase tracking-wider">
                            Time</th>
                        <th scope="col" class="px-6 py-3 text-left font-large text-black dark:text-gray-200 uppercase tracking-wider">
                            Pontuação</th>
                        <th scope="col" class="px-6 py-3 text-left font-large text-black dark:text-gray-200 uppercase tracking-wider">
                            Vitórias</th>
                        <th scope="col" class="px-6 py-3 text-left font-large text-black dark:text-gray-200 uppercase tracking-wider">
                            Derrotas</th>
                    </tr>
                </thead>
                <tbody class="bg-violet-400 divide-y divide-gray-200">
                    <tr></tr>
                    @if(isset($campeonato->teams))
                    @foreach($teams as $team)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $team->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $team->score }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $team->wins }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $team->losses }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <div class="flex space-x-4 mt-8">
            <button type="button" class="hover:bg-gray-700 border border-gray-700 text-gray-700 hover:text-gray-100 px-4 py-2 rounded no-outline focus:shadow-outline select-none" @click="view = false">Fechar</button>
        </div>
    </div>

</div>