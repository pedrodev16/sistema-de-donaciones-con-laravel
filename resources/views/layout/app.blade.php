<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- tailwindcss -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
@livewireStyles
    <title>app</title>
</head>
<body style="background: #dbf3ed;">
    <!-- Navigation -->
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white
            text-2xl font-bold">App</a>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#beneficiarioTable').DataTable();
        });
    </script>
</body>
</html>
