<div style="width: 100%; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <h1 style="font-size: 24px; font-weight: bold; text-align: center; margin-top: 20px;">Informe de Donaciones</h1>

    <h2>Datos de Beneficiario</h2>

    <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
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
            @foreach ($donaciones as $d)
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $d->created_at }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">

                          <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
                             @php
                            $l = json_decode($d->medicinas)
                        @endphp
        <tr>
               @foreach ($l as $m)
          <td style="padding: 10px; border: 1px solid #ddd;"> {{ $m->nombre }}@if (!$loop->last), @endif</td>

                             <td style="padding: 10px; border: 1px solid #ddd;">{{ $m->cantidad }}</td>
        </tr>
         @endforeach
      </table>




                             </td>


                </tr>
            @endforeach
        </tbody>
    </table>
</div>
