<div x-data="{ create: @entangle('showCreate')}" class="max-w-6xl mx-auto">
    @include('livewire.players.players-create')
    <div x-data="{ edit: @entangle('showEdit')}">
        @include('livewire.players.players-edit')
        <div class="m-2 p-2">
            <div class="flex justify-end items-center">
            <button @click="create = true" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800  focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Criar</button>
            </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                        Id</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                        Nome</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                        Time</th>
                                    <th scope="col" class="relative px-6 py-3">Edit</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr></tr>
                                @foreach ($players as $player)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $player->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $player->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $player->name }}
                                    </td>
                                    <td class="flex justify-center">
                                        <div class="pt-6 ">
                                            <button type="button" wire:click.prevent="" 
                                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                            Ver</button>
                                        </div>
                                        <div class="pt-6">
                                        <button wire:click.prevent="edit({{ $player->id }})" @click="edit = true" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</button>
                                        </div>
                                        <div class="pt-6">
                                        <button type="button" 
                                        onclick="return confirm('Tem certeza que deseja remover {{ addslashes($player->name) }}?') || event.stopImmediatePropagation()" wire:click.prevent="deletePlayer({{ $player->id }})" 
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        Delete</button>
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


        <div x-show="!create">
            <div x-show="!edit"></div>
        </div>
    </div>
</div>