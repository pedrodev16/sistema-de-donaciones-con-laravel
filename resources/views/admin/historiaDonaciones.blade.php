@extends('layout.app')
@section('content')
    <div class="container mx-auto  bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center mt-8">Historia de Donaciones</h1>

        <a href="{{route('donaciones')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Nuevo Registro</a>

        <table id="beneficiarioTable" class="table-auto w-full mt-8">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nombre</th>

                    <th class="px-4 py-2">Cedula</th>
                    <th class="px-4 py-2">Dia</th>
                      <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donaciones as $d)
                    <tr>
                        <td class="border px-4 py-2">{{ $d->beneficiario->nombre }}  {{ $d->beneficiario->apellido }}</td>
                        <td class="border px-4 py-2">{{ $d->beneficiario->cedula }}</td>
                        <td class="border px-4 py-2">{{ $d->created_at }}</td>
                        <td class="border px-4 py-2">
                            {{-- @php
                                $l = json_decode($d->medicinas)
                            @endphp --}}
                            {{-- @foreach ($l as $m)
                                {{ $m->nombre }}@if (!$loop->last), @endif
                            @endforeach --}}
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md">Ver</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
