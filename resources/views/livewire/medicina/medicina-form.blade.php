<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-3xl font-semibold mb-6">Medicinas</h2>
    <form wire:submit.prevent="save">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="nombre">Nombre</label>
                <input type="text" wire:model="nombre" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="nombre" name="nombre">
                @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="descripcion">Descripcion</label>
                <input type="text" wire:model="descripcion" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="descripcion" name="descripcion">
                @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="tipo">Tipo</label>
                <input type="text" wire:model="tipo" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="tipo" name="tipo">
                @error('tipo') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="presentacion">Presentacion</label>
                <input type="text" wire:model="presentacion" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="presentacion" name="presentacion">
                @error('presentacion') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="laboratorio">Laboratorio</label>
                <input type="text" wire:model="laboratorio" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="laboratorio" name="laboratorio">
                @error('laboratorio') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div class="col-span-1 md:col-span-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md shadow-sm">Guardar</button>
            </div>
        </div>
    </form>
</div>
