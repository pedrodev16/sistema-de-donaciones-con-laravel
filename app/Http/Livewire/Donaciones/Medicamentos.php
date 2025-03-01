<?php

namespace App\Http\Livewire\Donaciones;

use App\Models\Medicinas;
use Livewire\Component;

class Medicamentos extends Component
{
    public $search;
    public $selectemedicamento;
    public $benef = false;

    protected $listeners = ['beneficiario_seleccionado'];

    public function beneficiario_seleccionado()
    {
        $this->benef = true;
    }
    public function  selectMedicina()
    {
        $this->emit('addmedic', $this->selectemedicamento);
    }
    public function render()
    {
        $Medicamentos = Medicinas::where('nombre', 'like', '%' . $this->search . '%')->get();
        return view('livewire.donaciones.medicamentos', ['medicamentos' => $Medicamentos]);
    }
}
