<div class="tarjeta p-4 rounded shadow transform transition duration-500 hover:scale-105">

@php
    $dt="";
@endphp
    @if($ver_vencidas)
@php
    $dt="Vencidas ".$cantidad_medicinas_vencidas ;
@endphp

    @else
  <button wire:click="showExpiredMedicines" class="mb-4 bg-red-500 text-white px-4 py-2 rounded">Medicinas Vencidas {{$cantidad_medicinas_vencidas}}</button>
    @endif
   <h2 class="text-2xl font-bold mb-4">Lista de Medicinas {{$dt}}</h2>
    <table id="beneficiarioTable" class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Nombre</th>
                <th class="py-2">Cantidad</th>
                <th class="py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicinas as $medicina)
                <tr class="border-b">
                    <td class="py-2">{{ $medicina->nombre }} {{$medicina->dosis}}  {{$medicina->tipo_dosis}}</td>
                    <td class="py-2">{{ $medicina->stocks[0]->cantidad }}</td>
                    <td class="py-2">
                        <button wire:click="edit({{ $medicina->id }})" class="text-blue-500">Editar</button>
                        {{-- <button wire:click="delete({{ $medicina->id }})" class="text-red-500">Eliminar</button> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
