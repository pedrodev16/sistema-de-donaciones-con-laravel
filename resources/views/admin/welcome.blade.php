@extends('layout.app')
@section('content')
<div>
      <div class="flex justify-center mb-9">
        <img src="{{ asset('asset/logo.png') }}" alt="Logo" class="h-52">
    </div>
    <div class="container mx-auto tarjeta">
        <h1 class="text-3xl font-bold text-center mt-8" style="color: #fff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Bienvenido al panel de administración</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-base p-6 shadow-md rounded-md transform transition duration-500 hover:scale-105 text-center">
            <h2 class="text-2xl font-semibold mb-4">Beneficiarios</h2>
            <p class="text-white text-3xl">Total Beneficiarios: {{ $cantidad_beneficiarios }}</p>
            </div>
            <div class="bg-white p-6 shadow-md rounded-md transform transition duration-500 hover:scale-105 text-center">
            <h2 class="text-2xl font-semibold mb-4">Donaciones</h2>
            <p class="text-black text-3xl">Total Donaciones: {{ $cantidad_donaciones }}</p>
            </div>
            <div class="bg-base p-6 shadow-md rounded-md transform transition duration-500 hover:scale-105 text-center">
            <h2 class="text-2xl font-semibold mb-4">Medicinas</h2>
            <p class="text-white text-3xl">Total Medicinas Donadas: {{  $cantidad_medicinas }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
