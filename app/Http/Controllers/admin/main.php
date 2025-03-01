<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\donaciones;
use Illuminate\Http\Request;

class main extends Controller
{
    public function donaciones()
    {
        $donaciones = donaciones::all();

        return view('admin.historiaDonaciones', compact('donaciones'));
    }
}
