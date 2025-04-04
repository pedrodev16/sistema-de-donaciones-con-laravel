

    <div class="container mx-auto  bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center mt-8">Informe de Donación 000{{ $donaciones->id }}</h1>



    <h2>Datos de Beneficiario</h2>

            <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
                  <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Nombre:</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $datos->nombre }} {{ $datos->apellido }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Cedula:</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $datos->cedula }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Telefono:</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $datos->telefono }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Correo:</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $datos->email }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Fecha de nacimiento:</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $datos->fecha_nacimiento }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Genero:</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $datos->sexo }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Estado civil:</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $datos->estado_civil }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Discapacidad:</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $datos->discapacidad }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Enfermedad:</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $datos->enfermedad }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Tipo de sangre:</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $datos->tipo_sangre }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Observaciones:</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $datos->observaciones }}</td>
        </tr>
    </table>






       <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 10px; border: 1px solid #ddd;">Dia</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Medicina</th>

            </tr>
        </thead>
        <tbody>

                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $donaciones->created_at }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">

        <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
            <thead>
            <tr>
                <th style="padding: 10px; border: 1px solid #ddd;">Nombre</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Cantidad</th>
                         <th style="padding: 10px; border: 1px solid #ddd;">Codigo</th>

            </tr>
        </thead>
                   @php
             $l = json_decode($donaciones->medicinas)
         @endphp
        <tr>
               @foreach ($l as $m)
        <td style="padding: 10px; border: 1px solid #ddd;"> {{ $m->nombre }} {{ $m->dosificacion}}@if (!$loop->last), @endif</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $m->cantidad }}</td>
         <td style="padding: 10px; border: 1px solid #ddd;">{{ $m->codigo }}</td>
        </tr>
         @endforeach
      </table>




                             </td>


                </tr>

        </tbody>
    </table>
    </div>
