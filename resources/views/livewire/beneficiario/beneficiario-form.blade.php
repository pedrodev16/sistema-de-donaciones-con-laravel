<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Formulario de Usuario</h2>
    <form wire:submit.prevent="save">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="nombre">Nombre</label>
                <input type="text" wire:model="nombre" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="nombre" name="nombre">
                @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="apellido">Apellido</label>
                <input type="text" wire:model="apellido" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="apellido" name="apellido">
                @error('apellido') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="direccion">Dirección</label>
                <input type="text" wire:model="direccion" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="direccion" name="direccion">
                @error('direccion') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="telefono">Teléfono</label>
                <input type="text" wire:model="telefono" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="telefono" name="telefono">
                @error('telefono') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="email">Email</label>
                <input type="email" wire:model="email" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="email" name="email">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" wire:model="fecha_nacimiento" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="fecha_nacimiento" name="fecha_nacimiento">
                @error('fecha_nacimiento') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="sexo">Sexo</label>
                <input type="text" wire:model="sexo" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="sexo" name="sexo">
                @error('sexo') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="edad">Edad</label>
                <input type="number" wire:model="edad" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="edad" name="edad">
                @error('edad') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="estado_civil">Estado Civil</label>
                <input type="text" wire:model="estado_civil" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="estado_civil" name="estado_civil">
                @error('estado_civil') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="tipo_sangre">Tipo de Sangre</label>
                <input type="text" wire:model="tipo_sangre" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="tipo_sangre" name="tipo_sangre">
                @error('tipo_sangre') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="enfermedades">Enfermedades</label>
                <input type="text" wire:model="enfermedades" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="enfermedades" name="enfermedades">
                @error('enfermedades') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="alergias">Alergias</label>
                <input type="text" wire:model="alergias" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="alergias" name="alergias">
                @error('alergias') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div class="col-span-1 md:col-span-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Guardar</button>
            </div>
        </div>
    </form>
</div>
