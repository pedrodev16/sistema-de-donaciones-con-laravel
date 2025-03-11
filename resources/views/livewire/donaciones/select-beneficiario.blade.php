<div class="p-4 bg-white p-4 rounded shadow">



    <div class="text-lg font-semibold mb-4">Seleccionar Beneficiario</div>
    <input type="text" wire:model="search" placeholder="Buscar beneficiarios..." class="w-full p-2 border border-gray-300 rounded mb-4">

    <select wire:model="selectedBeneficiario" class="w-full p-2 border border-gray-300 rounded mb-4">
<option>seleccionar</option>
        @foreach ($beneficiarios as $beneficiario)
            <option value="{{ $beneficiario->id }}">{{ $beneficiario->nombre }}</option>
        @endforeach
    </select>
    <button wire:click="addBeneficiario" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Seleccionar</button>

</div>
