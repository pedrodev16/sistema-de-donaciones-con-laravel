<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\beneficiarios;
use App\Models\donaciones;
use App\Models\Medicinas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class main extends Controller
{

    public function home()
    {
        $donacionesPorDia = DB::table('donaciones')
            ->select(DB::raw('DATE(created_at) as fecha'), DB::raw('SUM(cantidad) as total'))
            ->groupBy('fecha')
            ->get();

        $donacionesPorMes = DB::table('donaciones')
            ->select(DB::raw('YEAR(created_at) as anio'), DB::raw('MONTH(created_at) as mes'), DB::raw('SUM(cantidad) as total'))
            ->groupBy('anio', 'mes')
            ->get();

        $donacionesPorAno = DB::table('donaciones')
            ->select(DB::raw('YEAR(created_at) as anio'), DB::raw('SUM(cantidad) as total'))
            ->groupBy('anio')
            ->get();

        $cantidad_medicinas_vencidas = Medicinas::where('fecha_vencimiento', '<', now())->count();
        $cantidad_beneficiarios = beneficiarios::all()->count();
        $cantidad_donaciones = donaciones::count();

        $cantidad_medicinas = donaciones::sum('cantidad');
        return view('admin.Welcome', compact('cantidad_medicinas_vencidas', 'cantidad_beneficiarios', 'cantidad_donaciones', 'cantidad_medicinas', 'donacionesPorDia', 'donacionesPorMes', 'donacionesPorAno'));
    }
    public function donaciones()
    {
        $donaciones = donaciones::all();

        return view('admin.historiaDonaciones', compact('donaciones'));
    }

    public function informedonacion($id)
    {


        if (!$id) {
            return redirect()->back()->withErrors(['error' => 'No ID provided.']);
        }
        try {
            $donaciones = donaciones::find($id);

            $datos = beneficiarios::find($donaciones->beneficiario_id);

            if (!$datos) {
                return redirect()->back()->withErrors(['error' => 'Beneficiary not found.']);
            }




            return view('admin.informe_donacion', compact('donaciones', 'datos'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while fetching the data.']);
        }
    }

    public function informe($id)
    {

        if (!$id) {
            return redirect()->back()->withErrors(['error' => 'No ID provided.']);
        }
        try {
            $datos = beneficiarios::find($id);

            if (!$datos) {
                return redirect()->back()->withErrors(['error' => 'Beneficiary not found.']);
            }

            $donaciones = donaciones::where('beneficiario_id', $id)->get();


            return view('admin.informe_beneficiario', compact('donaciones', 'datos'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while fetching the data.']);
        }
    }

    public function imprimir_informe($id)
    {


        if (!$id) {
            return redirect()->back()->withErrors(['error' => 'No ID provided.']);
        }
        try {
            $datos = beneficiarios::find($id);
            if (!$datos) {
                return redirect()->back()->withErrors(['error' => 'Beneficiary not found.']);
            }

            $donaciones = donaciones::where('beneficiario_id', $id)->get();
            // dd($datos_beneficiarios);
            //  return view('admin.reportes_pdf.informe', compact('donaciones', 'datos'));

            $pdf = Pdf::loadView('admin.reportes_pdf.informe', compact('donaciones', 'datos'));
            return $pdf->download('archivo.pdf');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while fetching the data.']);
        }
    }


    public function informebeneficiarioPDF($id)
    {
        if (!$id) {
            return redirect()->back()->withErrors(['error' => 'No ID provided.']);
        }
        try {
            $datos = beneficiarios::find($id);
            if (!$datos) {
                return redirect()->back()->withErrors(['error' => 'Beneficiary not found.']);
            }

            $donaciones = donaciones::where('beneficiario_id', $id)->get();
            // dd($datos_beneficiarios);
            //  return view('admin.reportes_pdf.informe', compact('donaciones', 'datos'));

            $pdf = Pdf::loadView('admin.reportes_pdf.informe_beneficiario', compact('donaciones', 'datos'));
            return $pdf->download('archivo.pdf');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while fetching the data.']);
        }
    }

    public function informedonacionPDF($id)
    {


        if (!$id) {
            return redirect()->back()->withErrors(['error' => 'No ID provided.']);
        }
        try {

            $donaciones = donaciones::find($id);

            //  dd($donaciones);
            $datos = beneficiarios::find($donaciones->beneficiario_id);
            // dd($datos);
            if (!$datos) {
                return redirect()->back()->withErrors(['error' => 'Beneficiary not found.']);
            }




            // return view('admin.reportes_pdf.informe_donacion', compact('donaciones', 'datos'));
            $pdf = Pdf::loadView('admin.reportes_pdf.informe_donacion', compact('donaciones', 'datos'));
            return $pdf->download('archivo.pdf');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while fetching the data.']);
        }
    }
}
