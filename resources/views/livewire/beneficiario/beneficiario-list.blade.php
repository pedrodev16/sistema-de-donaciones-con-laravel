<div class="bg-white p-4 rounded shadow tarjeta transform transition duration-500 hover:scale-105">
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
                            <a href="{{ route('informe', $beneficiario->id) }}" class="bg-blue-100 text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out transform hover:scale-105 p-2 rounded">Ver informe</a>
                            <button wire:click="edit({{ $beneficiario->id }})" class="bg-blue-100 text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out transform hover:scale-105 p-2 rounded">Editar</button>
                            <button wire:click="confirmDelete({{ $beneficiario->id }})" class="bg-red-100 text-red-500 hover:text-red-700 transition duration-300 ease-in-out transform hover:scale-105 p-2 rounded">Eliminar</button>
                    </td>



                </tr>
            @endforeach
        </tbody>
    </table>


    {{-- <!-- Delete Confirmation Modal  --> --}}
    <div class="fixed z-10 inset-0 overflow-y-auto" style="display: {{ $confirmingDelete ? 'block' : 'none' }};">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Eliminar Beneficiario
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    ¿Estás seguro de que deseas eliminar este beneficiario? Esta acción no se puede deshacer.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" wire:click="delete({{ $confirmingDelete }})">
                        Eliminar
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" wire:click="$toggle('confirmingDelete')">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>




</div>
