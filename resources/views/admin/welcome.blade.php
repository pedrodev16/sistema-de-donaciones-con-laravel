@extends('layout.app')
@section('content')
<div>
      <div class="flex justify-center mb-9" id="xx">
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








<div class="bg-white w-4/5 mx-auto my-8 p-4 rounded-md shadow-md">
    <button id="generarPdf" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">Exportar Gráfico</button>
    <canvas id="lineChart"></canvas>
</div>








<script>
    document.getElementById('generarPdf').addEventListener('click', function () {
        // Convertir el gráfico a una imagen base64
        var canvas = document.getElementById('lineChart');
        var imgData = canvas.toDataURL('image/png');

        // Enviar la imagen al servidor usando fetch
        fetch('/generar-pdf', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ imagen: imgData })
        }).then(response => {
            if (response.ok) {
                return response.blob(); // Recibe el archivo PDF
            }
        }).then(blob => {
            // Crear un enlace de descarga para el PDF
            var url = window.URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'donaciones.pdf';
            a.click();
        });
    });
</script>








<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Datos para Donaciones por Día
    var fechasDia = {!! json_encode($donacionesPorDia->pluck('fecha')) !!};
    var totalesDia = {!! json_encode($donacionesPorDia->pluck('total')) !!};

    // Datos para Donaciones por Mes
    var etiquetasMes = {!! json_encode($donacionesPorMes->map(fn($item) => $item->anio . '-' . str_pad($item->mes, 2, '0', STR_PAD_LEFT))->toArray()) !!};
    var totalesMes = {!! json_encode($donacionesPorMes->pluck('total')) !!};

    // Datos para Donaciones por Año
    var etiquetasAno = {!! json_encode($donacionesPorAno->pluck('anio')) !!};
    var totalesAno = {!! json_encode($donacionesPorAno->pluck('total')) !!};

    // Configuración del gráfico
    var ctx = document.getElementById('lineChart').getContext('2d');
    var lineChart = new Chart(ctx, {
        type: 'line', // Tipo de gráfico
        data: {
            labels: [...fechasDia, ...etiquetasMes, ...etiquetasAno], // Combina todas las etiquetas
            datasets: [
                {
                    label: 'Donaciones por Día',
                    data: totalesDia,
                    borderColor: 'rgba(75, 192, 192, 1)', // Color de la línea
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Fondo bajo la línea
                    borderWidth: 2,
                    tension: 0.4
                },
                {
                    label: 'Donaciones por Mes',
                    data: totalesMes,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 2,
                    tension: 0.4
                },
                {
                    label: 'Donaciones por Año',
                    data: totalesAno,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 2,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top' // Muestra las etiquetas en la parte superior
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tiempo'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad Donada'
                    }
                }
            }
        }
    });
</script>




</div>
@endsection
