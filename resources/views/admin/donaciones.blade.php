@extends('layout.app')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mt-8">Donaciones</h1>
{{-- se selecciona un beneficiario y se le asignan productos
cuadro para ver  todos los productos con buscador y paginación
cada producto con boton de añadir al carrito
otra sección con los productos añadidos al carrito que se actualiza en tiempo real con livewire y se puede eliminar productos
botón de finalizar donacion que muestra un mensaje de éxito con sweetalert2
registrar donaciones --}}
 <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Columna de Lista de Medicinas -->
<livewire:donaciones.select-beneficiario>
   <livewire:donaciones.medicamentos>
    <hr>
 </div>
            <!-- Columna de Formulario de Registro -->

    <livewire:donaciones.formulario-donacion>


    </div>
@endsection
@section('alscripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
          Livewire.on('error', evento => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: evento.message,
            });


        });

        Livewire.on('ok', evento => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: evento.message,
                showConfirmButton: false,
                timer: 1500
            });

        });
    </script>
@endsection
