@extends('layout.app')
@section('content')

    <div class="container mx-auto  bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center mt-8">Informe de Donaciones</h1>


        <h2>datos de beneficoario</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <p class="font-semibold">Cedula:</p>
                    <p>{{ $datos->cedula }}</p>
                </div>
                <div>
                    <p class="font-semibold">Telefono:</p>
                    <p>{{ $datos->telefono }}</p>
                </div>
                <div>
                    <p class="font-semibold">Correo:</p>
                    <p>{{ $datos->email }}</p>
                </div>
                <div>
                    <p class="font-semibold">Fecha de nacimiento:</p>
                    <p>{{ $datos->fecha_nacimiento }}</p>
                </div>
                <div>
                    <p class="font-semibold">Genero:</p>
                    <p>{{ $datos->sexo }}</p>
                </div>
                <div>
                    <p class="font-semibold">Estado civil:</p>
                    <p>{{ $datos->estado_civil }}</p>
                </div>
                <div>
                    <p class="font-semibold">Discapacidad:</p>
                    <p>{{ $datos->discapacidad }}</p>
                </div>
                <div>
                    <p class="font-semibold">Enfermedad:</p>
                    <p>{{ $datos->enfermedad }}</p>
                </div>
                <div>
                    <p class="font-semibold">Tipo de sangre:</p>
                    <p>{{ $datos->tipo_sangre }}</p>
                </div>
                <div>
                    <p class="font-semibold">Observaciones:</p>
                    <p>{{ $datos->observaciones }}</p>
                </div>
            </div>






        <table id="beneficiarioTable" class="table-auto w-full mt-8">
            <thead>
                <tr>
                       <th class="px-4 py-2">Dia</th>
                    <th class="px-4 py-2">Medicina</th>

                    <th class="px-4 py-2">Cedula</th>

                      <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donaciones as $d)
                    <tr>
                               <td class="border px-4 py-2">{{ $d->created_at }}</td>
                        {{-- <td class="border px-4 py-2">{{ $d->beneficiario->nombre }}  {{ $d->beneficiario->apellido }}</td>
                        <td class="border px-4 py-2">{{ $d->beneficiario->cedula }}</td> --}}

                        <td class="border px-4 py-2">
                         @php
                                $l = json_decode($d->medicinas)
                            @endphp
                       @foreach ($l as $m)
                                {{ $m->nombre }}@if (!$loop->last), @endif
                            @endforeach
                              </td>
<td class="border px-4 py-2">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md">Ver</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection

