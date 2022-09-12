<div class="max-w-6xl mx-auto">
    <div class="">
    <x-modal botao='Criar jogador' title='Criar jogador' update="" name="name"></x-modal>
    <div class="m-2 p-2">
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
                                <td class="px-6 py-4 text-right text-sm">
                                    <div class="flex space-x-2">
                                        <x-modal :player_id="$player->id " botao='Editar' title='Editar jogador'  id="edit-player"
                                        update="true"></x-modal>
                                        <button @click="open = true; $nextTick(() => $refs.closeBtn.focus())" class="bg-red-400 hover:bg-red-600" wire:click.prevent="deletePlayer({{ $player->id }})">Delete
                                        <button>
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
    <div>

    </div>
</div>