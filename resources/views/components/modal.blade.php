@props(['botao','title', 'update', 'name', 'player_id', 'teams'])

<div class="container mx-auto text-center ">
    <div x-data="{ open: @entangle('show') }" class="">

        @if($update)
        <button onclick="document.getElementById('{{ $player_id }}')" wire:click.prevent="edit({{ $player_id }})" @click="open = true; $nextTick(() => $refs.closeBtn.focus())" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ $botao }}</button>
        @else
        <button @click="open = true; $nextTick(() => $refs.closeBtn.focus())" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800  focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ $botao }}</button>
        @endif

        <!-- Open Modal -->
        <div id="{{ $player_id }}" wire:ignore.self x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" class="modal absolute right-0 left-0 w-full h-full flex items-center justify-center" style="background-color: rgba(0,0,0,.5);">
            <div class="text-left bg-white lg:p-14 lg:px-52 shadow-xl rounded-lg mx-2 md:mx-0">
                <div class="flex w-96 justify-between items-center">
                    <div class="text-2xl">{{ $title }}</div>

                    <!-- Modal Close -->
                    <button class="" @click="open = false">
                        <svg class="w-4 tex-gray-700 fill-current transition duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001">
                            <path d="M284.286 256.002L506.143 34.144c7.811-7.811 7.811-20.475 0-28.285-7.811-7.81-20.475-7.811-28.285 0L256 227.717 34.143 5.859c-7.811-7.811-20.475-7.811-28.285 0-7.81 7.811-7.811 20.475 0 28.285l221.857 221.857L5.858 477.859c-7.811 7.811-7.811 20.475 0 28.285a19.938 19.938 0 0014.143 5.857 19.94 19.94 0 0014.143-5.857L256 284.287l221.857 221.857c3.905 3.905 9.024 5.857 14.143 5.857s10.237-1.952 14.143-5.857c7.811-7.811 7.811-20.475 0-28.285L284.286 256.002z" />
                        </svg>
                    </button>
                    <!-- Modal Close -->
                </div>

                <form wire:submit.prevent="updatePlayer" class="w-96">
                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                        <div class="mt-1">
                            <input required type="text" id="name" wire:model="name" name="name" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                        @error('name')
                        <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="age" class="block text-sm font-medium text-gray-700">Idade</label>
                        <div class="mt-1">
                            <input required type="number" id="age" wire:model="age" name="age" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('age')
                        <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="nationality" class="block text-sm font-medium text-gray-700">Nacionalidade</label>
                        <div class="mt-1">
                            <input required type="text" id="nationality" wire:model="nationality" name="nationality" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('nationality')
                        <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="team_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Times</label>
                        <select wire:model="team_id" id="team_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Selecione um time:</option>
                            @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>

                        @error('team_id')
                        <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex space-x-4 mt-8">
                        @if ($update)
                        <button  type="submit" x-ref="closeBtn" class="focus:outline-none focus:ring focus:ring-gray-700 hover:bg-gray-700 border border-gray-700 text-gray-700 hover:text-gray-100 px-4 py-2 rounded no-outline focus:shadow-outline select-none">Editar</button>
                        @if ($errors->any())
                        <?php echo 'tem erro'; ?>
                        @else
                        <?php echo 'nao tem erro'; ?>
                        @endif
                        @else
                        <button type="submit" wire:click="storePlayer" x-ref="closeBtn" class="focus:outline-none focus:ring focus:ring-gray-700 hover:bg-gray-700 border border-gray-700 text-gray-700 hover:text-gray-100 px-4 py-2 rounded no-outline focus:shadow-outline select-none">Criar</button>
                        @endif
                        <button class="hover:bg-gray-700 border border-gray-700 text-gray-700 hover:text-gray-100 px-4 py-2 rounded no-outline focus:shadow-outline select-none" @click="open = false">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- End Open Modal -->
    </div>
</div>


