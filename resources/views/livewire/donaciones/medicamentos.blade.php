<div class="p-4 bg-white p-4 rounded shadow">
      @if($benef)
    <div class="text-lg font-semibold mb-4">Seleccionar Medicanento</div>
    <input type="text" wire:model="search" placeholder="Buscar beneficiarios..." class="w-full p-2 border border-gray-300 rounded mb-4">


     <select wire:model="selectemedicamento" class="w-full p-2 border border-gray-300 rounded mb-4">
<option>seleccionar</option>
        @foreach ($medicamentos as $medicamento)
            <option value="{{ $medicamento->id }}">{{$medicamento->nombre }}</option>
        @endforeach
    </select>
    <button wire:click="selectMedicina" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Añadir</button>
</div>

@endif
</div>
