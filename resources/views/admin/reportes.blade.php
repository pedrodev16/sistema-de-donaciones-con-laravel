<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Donaciones</title>
</head>
<body>
    <!--  'cantidad_medicinas_vencidas', 'cantidad_beneficiarios', 'cantidad_donaciones', 'cantidad_medicinas', 'donacionesPorDia', 'donacionesPorMes', 'donacionesPorAno' -->
    <h1>Reporte de Donaciones</h1>
    <img src="{{ $imagen }}" alt="Gráfico de Donaciones" style="width: 100%; height: auto;">
    <table>
        <thead>
            <tr>
                <th>Beneficiarios</th>
                <th>Donaciones</th>
                <th>Medicinas</th>
                <th>Medicinas Vencidas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid black;">{{ $cantidad_beneficiarios }}</td>
                <td style="border: 1px solid black;">{{ $cantidad_donaciones }}</td>
                <td style="border: 1px solid black;">{{ $cantidad_medicinas }}</td>
                <td style="border: 1px solid black;">{{ $cantidad_medicinas_vencidas }}</td>
            </tr>
        </tbody>
    </table>

    <h2>Donaciones por Día</h2>
    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="border: 1px solid black;">Día</th>
                <th style="border: 1px solid black;">Cantidad</th>
            </tr>
        </thead>
        <tbody>
@foreach ($donacionesPorDia as $d)
    <tr>
        <td style="border: 1px solid black;">{{ $d->fecha }}</td>

        <td style="border: 1px solid black;">
            <ul>
                  @php
                    $cant=0;
                    @endphp
                @foreach ($d->medicinas as $nombre => $cantidad)

                    <li>{{ $nombre }} (Cantidad: {{ $cantidad }})</li>
                        @php
                    $cant +=$cantidad ;
                    @endphp
                @endforeach

            </ul>
        </td>
         <td style="border: 1px solid black;">{{ $cant }}</td>
    </tr>
@endforeach



        </tbody>
    </table>
    <h2>Donaciones por Mes</h2>
    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="border: 1px solid black;">Año</th>
                <th style="border: 1px solid black;">Mes</th>
                <th style="border: 1px solid black;">Cantidad</th>
            </tr>
        </thead>
        <tbody>
     @foreach ($donacionesPorMes as $d)
    <tr>
        <td style="border: 1px solid black;">{{ $d->anio }}</td>
        <td style="border: 1px solid black;">{{ $d->mes }}</td>
        <td style="border: 1px solid black;">
            <ul>
                @php
                    $cant=0;
                    @endphp
                @endphp
                @foreach ($d->medicinas as $nombre => $cantidad)
                    <li>{{ $nombre }} (Cantidad: {{ $cantidad }})</li>
    @php
                    $cant +=$cantidad ;
                    @endphp
                @endforeach
            </ul>
        </td>
        <td style="border: 1px solid black;">Total: {{ $cant }}</td>
    </tr>
@endforeach

        </tbody>
    </table>
    <h2>Donaciones por Año</h2>
    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="border: 1px solid black;">Año</th>
                <th style="border: 1px solid black;">Cantidad</th>
            </tr>
        </thead>
        <tbody>
                @php
                    $cant=0;
                    @endphp
    @foreach ($donacionesPorAno as $d)
    <tr>
        <td style="border: 1px solid black;">{{ $d->anio }}</td>
        <td style="border: 1px solid black;">
            <ul>
                @foreach ($d->medicinas as $nombre => $cantidad)
                    <li>{{ $nombre }} (Cantidad: {{ $cantidad }})</li>
                        @php
                    $cant +=$cantidad ;
                    @endphp
                @endforeach
            </ul>
        </td>
          <td style="border: 1px solid black;">Total: {{ $cant }}</td>
    </tr>
@endforeach

        </tbody>
    </table>
</body>
</html>
