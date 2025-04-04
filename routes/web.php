<?php

use App\Http\Controllers\admin\main;
use App\Http\Controllers\Login\LoginController as LoginController;
use App\Models\beneficiarios;
use App\Models\donaciones;
use App\Models\Medicinas;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');


//middleware para proteger la ruta
Route::middleware(['auth'])->group(function () {



    Route::get('/beneficiarios', function () {
        return view('admin.beneficiarios');
    })->name('beneficiarios');

    Route::get('/donaciones', function () {
        return view('admin.donaciones');
    })->name('donaciones');

    Route::get('/home', [main::class, 'home'])->name('home');
    Route::get('/historiadonaciones', [main::class, 'donaciones'])->name('historiadonaciones');
    Route::get('/informe/{id}', [main::class, 'informe'])->name('informe');
    Route::get('/informedonacion/{id}', [main::class, 'informedonacion'])->name('informedonacion');
    Route::get('/imprimir_informe/{id}', [main::class, 'imprimir_informe'])->name('imprimir_informe');
    Route::get('/informebeneficiarioPDF/{id}', [main::class, 'informebeneficiarioPDF'])->name('informebeneficiarioPDF');

    Route::get('/informedonacionPDF/{id}', [main::class, 'informedonacionPDF'])->name('informedonacionPDF');







    // Route::get('/generar-pdf', function (Request $request) {
    // Route::get('/generar-pdf', function (Request $request) {
    Route::post('/generar-pdf', function (Request $request) {
        $imagen = $request->input('imagen');


        $donacionesPorDia = DB::table('donaciones')
            ->select(
                DB::raw('DATE(created_at) as fecha'),
                DB::raw('SUM(cantidad) as total') // Sumamos las cantidades directamente
            )
            ->groupBy('fecha') // Agrupar solo por la fecha
            ->get();

        // Procesar las medicinas sin duplicados
        foreach ($donacionesPorDia as $donacion) {
            // Obtener todas las medicinas del día correspondiente
            $medicinasDelDia = DB::table('donaciones')
                ->whereDate('created_at', $donacion->fecha)
                ->pluck('medicinas'); // Extraer solo el campo medicinas

            $medicinasAgrupadas = [];

            // Agrupar medicinas y sumar cantidades
            foreach ($medicinasDelDia as $jsonMedicinas) {
                $listaMedicinas = json_decode($jsonMedicinas, true);

                if (is_array($listaMedicinas)) {
                    foreach ($listaMedicinas as $medicina) {
                        if (!isset($medicinasAgrupadas[$medicina['nombre']])) {
                            $medicinasAgrupadas[$medicina['nombre']] = $medicina['cantidad'];
                        } else {
                            $medicinasAgrupadas[$medicina['nombre']] += $medicina['cantidad'];
                        }
                    }
                }
            }

            // Asignar las medicinas agrupadas al registro del día correspondiente
            $donacion->medicinas = $medicinasAgrupadas;
        }
        //_____________________________________________
        $donacionesPorMes = DB::table('donaciones')
            ->select(
                DB::raw('YEAR(created_at) as anio'),
                DB::raw('MONTH(created_at) as mes'),
                DB::raw('SUM(cantidad) as total')
            )
            ->groupBy('anio', 'mes') // Agrupamos solo por año y mes
            ->get();

        // Procesar las medicinas sin duplicados
        foreach ($donacionesPorMes as $donacion) {
            // Obtener todas las medicinas del mes correspondiente
            $medicinasDelMes = DB::table('donaciones')
                ->whereYear('created_at', $donacion->anio)
                ->whereMonth('created_at', $donacion->mes)
                ->pluck('medicinas'); // Obtenemos solo el campo medicinas

            $medicinasAgrupadas = [];

            // Agrupar medicinas y sumar cantidades
            foreach ($medicinasDelMes as $jsonMedicinas) {
                $listaMedicinas = json_decode($jsonMedicinas, true);

                if (is_array($listaMedicinas)) {
                    foreach ($listaMedicinas as $medicina) {
                        if (!isset($medicinasAgrupadas[$medicina['nombre']])) {
                            $medicinasAgrupadas[$medicina['nombre']] = $medicina['cantidad'];
                        } else {
                            $medicinasAgrupadas[$medicina['nombre']] += $medicina['cantidad'];
                        }
                    }
                }
            }

            // Asignar las medicinas agrupadas al registro del mes correspondiente
            $donacion->medicinas = $medicinasAgrupadas;
        }
        //________________________________________________________--
        $donacionesPorAno = DB::table('donaciones')
            ->select(
                DB::raw('YEAR(created_at) as anio'),
                DB::raw('SUM(cantidad) as total') // Sumamos las cantidades directamente
            )
            ->groupBy('anio') // Agrupamos solo por el año
            ->get();

        // Procesar las medicinas sin duplicados
        foreach ($donacionesPorAno as $donacion) {
            // Obtener todas las medicinas del año correspondiente
            $medicinasDelAno = DB::table('donaciones')
                ->whereYear('created_at', $donacion->anio)
                ->pluck('medicinas'); // Trae solo el campo medicinas como colección

            $medicinasAgrupadas = [];

            // Unificar medicinas y sumar cantidades
            foreach ($medicinasDelAno as $jsonMedicinas) {
                $listaMedicinas = json_decode($jsonMedicinas, true);

                if (is_array($listaMedicinas)) {
                    foreach ($listaMedicinas as $medicina) {
                        if (!isset($medicinasAgrupadas[$medicina['nombre']])) {
                            $medicinasAgrupadas[$medicina['nombre']] = $medicina['cantidad'];
                        } else {
                            $medicinasAgrupadas[$medicina['nombre']] += $medicina['cantidad'];
                        }
                    }
                }
            }

            // Asignamos las medicinas agrupadas al registro correspondiente
            $donacion->medicinas = $medicinasAgrupadas;
        }














        $cantidad_medicinas_vencidas = Medicinas::where('fecha_vencimiento', '<', now())->count();
        $cantidad_beneficiarios = beneficiarios::all()->count();
        $cantidad_donaciones = donaciones::count();

        $cantidad_medicinas = donaciones::sum('cantidad');



        // Crear el PDF con la imagen
        //  $totalano
        //  $totalmes
        //  $totaldia
        $pdf = Pdf::loadView('admin.reportes', compact('imagen', 'cantidad_medicinas_vencidas', 'cantidad_beneficiarios', 'cantidad_donaciones', 'cantidad_medicinas', 'donacionesPorDia', 'donacionesPorMes', 'donacionesPorAno'));
        // return view('admin.reportes', compact('imagen', 'cantidad_medicinas_vencidas', 'cantidad_beneficiarios', 'cantidad_donaciones', 'cantidad_medicinas', 'donacionesPorDia', 'donacionesPorMes', 'donacionesPorAno'));
        // Devolver el PDF como respuesta para descarga
        return $pdf->download('donaciones.pdf');
    });




    Route::get('/usuarios', function () {
        return view('admin.usuarios');
    })->name('usuarios');


    Route::get('/medicinas', function () {
        return view('admin.medicinas');
    })->name('medicinas');

    Route::get('/stock', function () {
        return view('admin.stock');
    })->name('stock');

    Route::get('/reportes', function () {
        return view('admin.reportes');
    })->name('reportes');


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
