<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\beneficiarios;
use App\Models\donaciones;
use App\Models\Medicinas;
use Illuminate\Http\Request;

class main extends Controller
{

    public function home()
    {

        $cantidad_beneficiarios = beneficiarios::all()->count();
        $cantidad_donaciones = donaciones::count();

        $cantidad_medicinas = donaciones::sum('cantidad');
        return view('admin.Welcome', compact('cantidad_beneficiarios', 'cantidad_donaciones', 'cantidad_medicinas'));
    }
    public function donaciones()
    {
        $donaciones = donaciones::all();

        return view('admin.historiaDonaciones', compact('donaciones'));
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
            // dd($datos_beneficiarios);
            return view('admin.informe', compact('donaciones', 'datos'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while fetching the data.']);
        }
    }
}
