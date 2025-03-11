<div class="tarjeta p-6 rounded-lg shadow-md transform transition duration-500 hover:scale-105">
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
                <label class="block text-gray-700 text-sm font-medium mb-2" for="cedula">Cedula</label>
                <input type="number" wire:model="cedula" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="cedula" name="cedula">
                @error('cedula') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
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
                <label class="block text-gray-700 text-sm font-medium mb-2" for="sexo">Genero</label>
              {{-- <input type="text" wire:model="sexo" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="sexo" name="sexo"> --}}
               <select wire:model="sexo" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="sexo" name="sexo">
              <option>Seleccione</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
              </select>
                @error('sexo') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="edad">Edad</label>
                <input type="number" wire:model="edad" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="edad" name="edad">
                @error('edad') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="estado_civil">Estado Civil</label>
             <select wire:model="estado_civil" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="estado_civil" name="estado_civil">
              <option>Seleccione</option>
                <option value="Soltero">Soltero</option>
                <option value="Casado">Casado</option>
                <option value="Divorciado">Divorciado</option>
                <option value="Viudo">Viudo</option>
              </select>
                @error('estado_civil') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="tipo_sangre">Tipo de Sangre</label>
                {{-- <input type="text" wire:model="tipo_sangre" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="tipo_sangre" name="tipo_sangre"> --}}
              <select wire:model="tipo_sangre" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="tipo_sangre" name="tipo_sangre">
                 <option>Seleccione</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
              </select>

                @error('tipo_sangre') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
                   {{-- <label class="block text-gray-700 text-sm font-medium mb-2" for="tipo_sangre">Tipo de Sangre</label> --}}
                {{-- <input type="text" wire:model="tipo_sangre" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="tipo_sangre" name="tipo_sangre"> --}}

            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2" for="discapacidad">Discapacidad</label>
                <input type="text" wire:model="discapacidad" class="form-input w-full border-gray-300 rounded-md shadow-sm" id="discapacidad" name="discapacidad">
                @error('discapacidad') <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
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
