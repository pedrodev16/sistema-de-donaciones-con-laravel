<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- tailwindcss -->
    <link href="{{ asset('asset/css/tailwind.min.css') }}" rel="stylesheet">
@livewireStyles
    <title>app</title>

    <style>
        .tarjeta{
            background-image: url("{{ asset('asset/fondo2.jpg') }}");
            /* background: radial-gradient(#e5e5e5, #77d5cb); */
    border-radius: 34px;
    border: solid #fff 5px;
        }
          .tarjeta2{
            background-image: url("{{ asset('asset/fondo3.jpg') }}");
            /* background: radial-gradient(#e5e5e5, #77d5cb); */
            background-repeat: round;
    border-radius: 34px;
    border: solid #fff 5px;
        }
        .bg-base{
            background-color: rgb(114 212 203);
        }
    </style>
</head>
<body style="background: url('{{ asset('asset/img1.jpg') }}') no-repeat center center; background-size: cover;">
    <!-- Navigation -->
    <nav style="background-color: rgb(114 212 203);" class=" p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-2xl font-bold flex items-center">
                <img src="{{ asset('asset/logo2.png') }}" alt="App Logo" class="h-10 mr-2">MEDICALIFE
            </a>
            <ul class="flex">
                <li><a href="{{route('home')}}" class="text-white
                hover:text-gray-200 px-4">Inicio</a></li>
                <li><a href="{{route('beneficiarios')}}" class="text-white
                hover:text-gray-200 px-4">Beneficiarios</a></li>
                <li><a href="{{ route('historiadonaciones')}}" class="text-white
                hover:text-gray-200 px-4">Donaciones</a></li>
                <li><a href="{{route('stock')}}" class="text-white
                    hover:text-gray-200 px-4">Stock</a></li>
                    <li><a href="{{route('medicinas')}}" class="text-white
                        hover:text-gray-200 px-4">Medicinas</a></li>
                    <li><a href="{{route('usuarios')}}" class="text-white
                        hover:text-gray-200 px-4">Usuarios</a></li>
            </ul>
            <!-- Auth Logout -->
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="text-white
                hover:text-gray-200 px-4">Logout</button>
            </form>


        </div>
    </nav>


    @yield('content')


    @livewireScripts
    @yield('alscripts')

     <!-- DataTables CDN -->
    <link rel="stylesheet" href="{{asset('asset/css/jquery.dataTables.min.css')}}">
    <script src="{{asset('asset/js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('asset/js/jquery.dataTables.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#beneficiarioTable').DataTable();
        });
    </script>
</body>
</html>
