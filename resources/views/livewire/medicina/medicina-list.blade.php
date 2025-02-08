<div class="bg-white p-4 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Lista de Medicinas</h2>
    <ul>
        @foreach ($medicinas as $medicina)
            <li class="border-b border-gray-200 py-2 flex justify-between items-center">
                <span class="text-gray-700">{{ $medicina->nombre }}</span>
                <span class="text-gray-500">{{ $medicina->id }}</span>
                <div>
                    <button wire:click="edit({{ $medicina->id }})" class="text-blue-500 hover:text-blue-700">Editar</button>
                    <button wire:click="delete({{ $medicina->id }})" class="text-red-500 hover:text-red-700 ml-2">Eliminar</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
