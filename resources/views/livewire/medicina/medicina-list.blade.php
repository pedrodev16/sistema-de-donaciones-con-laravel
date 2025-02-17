<div class="bg-white p-4 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Lista de Medicinas</h2>
    <ul>
        @foreach ($medicinas as $medicina)
            <li class="border-b border-gray-200 py-2 flex justify-between">
                {{ $medicina->nombre }}
                {{ $medicina->stocks[0]->cantidad }}
                <div>
                    <button wire:click="edit({{ $medicina->id }})" class="text-blue-500">Editar</button>
                    <button wire:click="delete({{ $medicina->id }})" class="text-red-500">Eliminar</button>
                </div>
            </li>
        @endforeach
    </ul>


</div>
