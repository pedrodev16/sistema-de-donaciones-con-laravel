<div class="bg-white p-4 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Lista de Beneficiario</h2>
    <table id="beneficiarioTable" class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cédula</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edad</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($beneficiario as $beneficiario)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $beneficiario->nombre }} {{ $beneficiario->apellido }}</td>

                    <td class="px-6 py-4 whitespace-nowrap">{{ $beneficiario->cedula }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $beneficiario->edad }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button wire:click="edit({{ $beneficiario->id }})" class="text-blue-500">Editar</button>
                        <button wire:click="delete({{ $beneficiario->id }})" class="text-red-500">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
