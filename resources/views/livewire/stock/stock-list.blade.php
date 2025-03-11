<div class="tarjeta p-4 rounded shadow transform transition duration-500 hover:scale-105">
    <h2 class="text-2xl font-bold mb-4">Stosck de Medicinas</h2>
    <table id="beneficiarioTable" class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($medicinas as $medicina)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $medicina->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $medicina->stocks[0]->cantidad }}</td>
                       <td style="background:{{ $medicina->stocks[0]->estado=='disponible'?'#b1e3ab':'#d5b4b4'}}" class="px-6 py-4 whitespace-nowrap">{{ $medicina->stocks[0]->estado }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button wire:click="edit({{ $medicina->stocks[0]->id }})" class="text-blue-500">Editar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>




</div>
