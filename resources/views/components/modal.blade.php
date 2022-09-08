@props(['botao','title', 'update'])

<div class="container mx-auto p-6 text-center">
    <div x-data="{ open: false }" class="mt-6">

        <!-- Modal Button -->
        <button @click="open = true; $nextTick(() => $refs.closeBtn.focus())" class="bg-black text-black px-4 py-2 rounded no-outline focus:shadow-outline select-none">{{ $botao }}</button>
        <!-- End Modal Button -->

        <!-- Open Modal -->
        <div x-show="open" @mousedown.away="open = false" @keydown.window.escape="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" class="absolute right-0 left-0 w-full h-full flex items-center justify-center" style="background-color: rgba(0,0,0,.5);">
            <div @click.away="open = false" class="text-left bg-white h-auto p-4 md:max-w-xl md:p-6 lg:p-10 shadow-xl rounded-lg mx-2 md:mx-0">
                <div class="flex justify-between items-center">
                    <div class="text-2xl">{{ $title }}</div>

                    <!-- Modal Close -->
                    <button class="" @click="open = false">
                        <svg class="w-4 tex-gray-700 fill-current transition duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001">
                            <path d="M284.286 256.002L506.143 34.144c7.811-7.811 7.811-20.475 0-28.285-7.811-7.81-20.475-7.811-28.285 0L256 227.717 34.143 5.859c-7.811-7.811-20.475-7.811-28.285 0-7.81 7.811-7.811 20.475 0 28.285l221.857 221.857L5.858 477.859c-7.811 7.811-7.811 20.475 0 28.285a19.938 19.938 0 0014.143 5.857 19.94 19.94 0 0014.143-5.857L256 284.287l221.857 221.857c3.905 3.905 9.024 5.857 14.143 5.857s10.237-1.952 14.143-5.857c7.811-7.811 7.811-20.475 0-28.285L284.286 256.002z" />
                        </svg>
                    </button>
                    <!-- Modal Close -->
                </div>

                <form  wire:submit.prevent="storePlayer">
                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                        <div class="mt-1">
                            <input type="text" id="name" wire:model="name" name="name" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('name')
                        <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="age" class="block text-sm font-medium text-gray-700">Idade</label>
                        <div class="mt-1">
                            <input type="number" id="age" wire:model="age" name="age" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('age')
                        <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="nationality" class="block text-sm font-medium text-gray-700">Nacionalidade</label>
                        <div class="mt-1">
                            <input type="text" id="nationality" wire:model="nationality" name="nationality" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('nationality')
                        <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="team_id" class="block text-sm font-medium text-gray-700">Time</label>
                        <div class="mt-1">
                            <input type="number" id="team_id" wire:model="team_id" name="team_id" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('team_id')
                        <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                </form>

                <div class="flex space-x-4 mt-8">
                    @if ($update)
                        <button type="submit" wire:click.prevent="storePlayer" x-ref="closeBtn" class="focus:outline-none focus:ring focus:ring-gray-700 hover:bg-gray-700 border border-gray-700 text-gray-700 hover:text-gray-100 px-4 py-2 rounded no-outline focus:shadow-outline select-none" @click="open = false">Editar</button>
                    @else
                        <button type="submit" wire:click="storePost" x-ref="closeBtn" class="focus:outline-none focus:ring focus:ring-gray-700 hover:bg-gray-700 border border-gray-700 text-gray-700 hover:text-gray-100 px-4 py-2 rounded no-outline focus:shadow-outline select-none" @click="open = false">Criar</button>
                    @endif
                    <button class="hover:bg-gray-700 border border-gray-700 text-gray-700 hover:text-gray-100 px-4 py-2 rounded no-outline focus:shadow-outline select-none" @click="open = false">Cancel</button>
                </div>
            </div>
        </div>
        <!-- End Open Modal -->
    </div>
</div>