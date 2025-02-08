<div class="bg-white p-4 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Lista de Beneficiario</h2>
    <ul>
        @foreach ($beneficiario as $beneficiario)
            <li class="border-b border-gray-200 py-2 flex justify-between">
                {{ $beneficiario->nombre }}

                <div>
                    <button wire:click="edit({{ $beneficiario->id }})" class="text-blue-500">Editar</button>
                    <button wire:click="delete({{ $beneficiario->id }})" class="text-red-500">Eliminar</button>
                </div>
            </li>
        @endforeach
    </ul>


</div>
