<div x-data="{ create: @entangle('showCreate')}">
    <div x-data="{ edit: @entangle('showEdit')}">
        <div x-data="{ view: @entangle('showView')}">
            @include('livewire.players.players-create')
            @include('livewire.players.players-edit')
            @include('livewire.players.players-view')
            <div class="max-w-6xl mx-auto">
                <h1 class="shadow-lg shadow-violet-800 mt-8 mb-12 py-2 align-middle font-semibold rounded-full text-3xl w-full text-center display:inline-block bg-purple-500">Jogadores</h1>
                <div class="m-2 p-2">
                    <div>
                        @if (session()->has('message'))
                        <div class="font-semibold text-black rounded-full align-middle bg-green-500 text-center text-xl alert alert-success mb-6 w-26">
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>
                    <div class="flex justify-end items-center">
                        <button @click="create = true" type="button" class="items-center flex flex-nowrap shadow-2xl focus:outline-none text-black bg-green-300 hover:bg-green-400  focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="mr-2 bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                            </svg> Criar Jogador</button>
                    </div>
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow-2xl overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="w-full divide-y divide-gray-200">
                                    <thead class="bg-violet-500 dark:bg-gray-600 dark:text-gray-200">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-large text-black dark:text-gray-200 uppercase tracking-wider">
                                                <b>Id</b>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-large text-black dark:text-gray-200 uppercase tracking-wider">
                                                <b>Nome</b>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-large text-black dark:text-gray-200 uppercase tracking-wider">
                                                <b>Time</b>
                                            </th>
                                            <th scope="col" class="px-28 py-3 text-left text-xs font-large text-black dark:text-gray-200 uppercase tracking-wider"><b>A????es</b></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-violet-400 divide-y divide-gray-200">
                                        <tr></tr>
                                        @foreach ($players as $player)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $player->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $player->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @foreach ($teams as $team)
                                                @if($player->team_id == $team->id)
                                                {{ $team->name }}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="flex items-center justify-items-center justify-center">
                                                <div class="pt-3 items-center justify-items-center">
                                                    <button @click="view = true" type="button" wire:click.prevent="viewPlayer({{ $player->id }})" class="focus:outline-none text-black bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:ring-purple-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-purple-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                        </svg></button>
                                                </div>
                                                <div class="pt-3 items-center justify-items-center">
                                                    <button wire:click.prevent="edit({{ $player->id }})" @click="edit = true" type="button" class="text-black bg-fuchsia-500 hover:bg-fuchsia-800 focus:ring-4 focus:ring-fuchsia-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                        </svg></button>
                                                </div>
                                                <div class="pt-3 items-center justify-items-center ">
                                                    <button type="button" onclick="return confirm('Tem certeza que deseja remover {{ addslashes($player->name) }}?') || event.stopImmediatePropagation()" wire:click.prevent="deletePlayer({{ $player->id }})" class="focus:outline-none text-black bg-pink-500 hover:bg-pink-800 focus:ring-4 focus:ring-pink-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-pink-500 dark:hover:bg-pink-500 dark:focus:ring-pink-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
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
            </div>

            <div x-show="!create">
                <div x-show="!edit">
                    <div x-show="!view">
                        <div class="flex justify-center mt-6 mb-6">
                            {{ $players->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>