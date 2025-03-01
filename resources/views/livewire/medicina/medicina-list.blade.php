<div class="bg-white p-4 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Lista de Medicinas</h2>
    <table id="beneficiarioTable" class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Nombre</th>
                <th class="py-2">Cantidad</th>
                <th class="py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicinas as $medicina)
                <tr class="border-b">
                    <td class="py-2">{{ $medicina->nombre }}</td>
                    <td class="py-2">{{ $medicina->stocks[0]->cantidad }}</td>
                    <td class="py-2">
                        <button wire:click="edit({{ $medicina->id }})" class="text-blue-500">Editar</button>
                        <button wire:click="delete({{ $medicina->id }})" class="text-red-500">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
