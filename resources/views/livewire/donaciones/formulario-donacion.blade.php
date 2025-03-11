 <div class="grid grid-cols-1 md:grid-cols-2 gap-4  bg-white p-4 rounded shadow">
    @if($mostrar_form)


<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
            Nombre
        </label>
        <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" type="text" placeholder="Nombre" wire:model="nombre">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="apellido">
            Apellido
        </label>
        <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="apellido" type="text" placeholder="Apellido" wire:model="apellido">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_nacimiento">
           F-N
        </label>
        <input  disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fecha_nacimiento" type="date" wire:model="fecha_nacimiento">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="ci">
        C-I
        </label>
        <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ci" type="text" placeholder="Cédula de Identidad" wire:model="ci">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">
            Teléfono
        </label>
        <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="telefono" type="text" placeholder="Teléfono" wire:model="telefono">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">
            Dirección
        </label>
        <input  disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="direccion" type="text" placeholder="Dirección" wire:model="direccion">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Correo
        </label>
        <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Correo Electrónico" wire:model="email">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="sexo">
            Sexo
        </label>
          <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sexo" type="text"  wire:model="sexo">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="edad">
            Edad
        </label>
        <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="edad" type="number" placeholder="Edad" wire:model="edad">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="estado_civil">
            Estado Civil
        </label>
         <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="estado_civil" type="text"  wire:model="estado_civil">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo_sangre">
            T-Sangre
        </label>
    <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tipo_sangre" type="text" placeholder="Correo Electrónico" wire:model="tipo_sangre">
    </div>

        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="discapacidad">
            Discapacidad
        </label>
    <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="discapacidad" type="text"  wire:model="discapacidad">
    </div>
    <div class="mb-4 col-span-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="enfermedades">
            Enfermedades
        </label>
        <textarea disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="enfermedades" wire:model="enfermedades"></textarea>
    </div>

    <div class="mb-4 col-span-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="alergias">
            Alergias
        </label>
        <textarea disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="alergias" wire:model="alergias"></textarea>
    </div>
</div>
<div>



<div class="p-4">
    <div class="text-lg font-semibold mb-4">Carrito de Medicinas</div>


    <ul>
        @foreach($items as $index => $item)
            <li>
                {{ $item['nombre'] }} - Cantidad:
                <input type="number" wire:model="items.{{ $index }}.cantidad" wire:change="updateCantidad({{ $index }}, $event.target.value)" min="1" max="{{ $item['stock'] }}">
                Stock disponible: {{ $item['stock'] }}
                <button wire:click="removeMedicamento({{ $index }})" class="bg-red-500 text-white px-2 py-1 rounded ml-2">Quitar</button>
            </li>


        @endforeach
    </ul>
   <button wire:click="registrarDonacion" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Registrar Donación</button>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>




</div>
@endif
 </div>
