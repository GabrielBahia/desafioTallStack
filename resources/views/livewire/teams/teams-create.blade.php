<div x-show.transition.duration.500ms="create" wire:ignore.self x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" class="modal absolute right-0 left-0 w-full h-full flex items-center justify-center" style="background-color: rgba(0,0,0,.5);">

    <div class="text-left bg-white lg:p-14 lg:px-52 shadow-xl rounded-lg mx-2 md:mx-0">
        <div class="flex w-96 justify-between items-center">
            <div class="text-2xl">Criar Time</div>

            <!-- Modal Close -->
            <button class="" @click="create = false">
                <svg class="w-4 tex-gray-700 fill-current transition duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001">
                    <path d="M284.286 256.002L506.143 34.144c7.811-7.811 7.811-20.475 0-28.285-7.811-7.81-20.475-7.811-28.285 0L256 227.717 34.143 5.859c-7.811-7.811-20.475-7.811-28.285 0-7.81 7.811-7.811 20.475 0 28.285l221.857 221.857L5.858 477.859c-7.811 7.811-7.811 20.475 0 28.285a19.938 19.938 0 0014.143 5.857 19.94 19.94 0 0014.143-5.857L256 284.287l221.857 221.857c3.905 3.905 9.024 5.857 14.143 5.857s10.237-1.952 14.143-5.857c7.811-7.811 7.811-20.475 0-28.285L284.286 256.002z" />
                </svg>
            </button>
            <!-- Modal Close -->
        </div>
        <form class="w-96">
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
                <label for="nationality" class="block text-sm font-medium text-gray-700">Nacionalidade</label>
                <div class="mt-1">
                    <input required type="text" id="nationality" wire:model="nationality" name="nationality" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                @error('nationality')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="sm:col-span-6">
                <label for="wins" class="block text-sm font-medium text-gray-700">Vitórias</label>
                <div class="mt-1">
                    <input required type="number" step="1" id="wins" wire:model="wins" name="wins" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                @error('wins')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="sm:col-span-6">
                <label for="losses" class="block text-sm font-medium text-gray-700">Derrotas</label>
                <div class="mt-1">
                    <input required type="number" step="1" id="losses" wire:model="losses" name="losses" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                @error('losses')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>


            <div class="sm:col-span-6">
                <label for="losses" class="block text-sm font-medium text-gray-700">Jogadores</label>
                <select multiple>
                @foreach($players as $player)
                    <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="sm:col-span-6">
                <label for="losses" class="block text-sm font-medium text-gray-700">Campeonatos</label>
                <select multiple>
                @foreach($championships as $championship)
                    <option value="{{ $championship->id }}">{{ $championship->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex space-x-4 mt-8">
                <button type="submit" wire:click.prevent="storeTeam" x-ref="closeBtn" class="focus:outline-none focus:ring focus:ring-gray-700 hover:bg-gray-700 border border-gray-700 text-gray-700 hover:text-gray-100 px-4 py-2 rounded no-outline focus:shadow-outline select-none">Criar</button>
                <button class="hover:bg-gray-700 border border-gray-700 text-gray-700 hover:text-gray-100 px-4 py-2 rounded no-outline focus:shadow-outline select-none" @click="create = false">Cancel</button>
            </div>

        </form>

    </div>
</div>
