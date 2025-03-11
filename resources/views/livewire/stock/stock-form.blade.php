<div class="tarjeta2 p-4 rounded shadow transform transition duration-500 hover:scale-105">
    <h2 class="text-2xl font-bold mb-4">Editar Stock</h2>
    <form wire:submit.prevent="save">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="medicina_id">ID de Medicina</label>
                <input type="text" wire:model="medicina_id" class="form-input w-full" id="medicina_id" name="medicina_id" disabled>
                @error('medicina_id') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="cantidad">Cantidad</label>
                <input type="number" wire:model="cantidad" class="form-input w-full" id="cantidad" name="cantidad">
                @error('cantidad') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="ubicacion">Ubicación</label>
                <input type="text" wire:model="ubicacion" class="form-input w-full" id="ubicacion" name="ubicacion">
                @error('ubicacion') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="observacion">Observación</label>
                <input type="text" wire:model="observacion" class="form-input w-full" id="observacion" name="observacion">
                @error('observacion') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="estado">Estado</label>
                <select wire:model="estado" class="form-input w-full" id="estado" name="estado">
                    <option value="">Seleccione una opción</option>
                    <option value="disponible">Disponible</option>
                    <option value="no disponible">No Disponible</option>
                </select>
                @error('estado') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
            </div>
        </div>
    </form>
</div>
