@extends('layout.app')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mt-8">Modulo de Stock</h1>




            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Columna de Lista de Medicinas -->
<livewire:stock.stock-list>
                <!-- Columna de Formulario de Registro -->
 <livewire:stock.stock-form>
            </div>


    </div>
@endsection
@section('alscripts')

<script src="{{asset('asset/js/sweetalert2@11.js')}}"></script>
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
