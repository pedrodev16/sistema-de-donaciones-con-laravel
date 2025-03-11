<?php

namespace App\Http\Livewire\Donaciones;

use App\Models\beneficiarios;
use Livewire\Component;

class SelectBeneficiario extends Component
{
    public $search = '';
    public $selectedBeneficiario;
    public $beneficiario_id;





    public function addBeneficiario()
    {
        $this->emit('beneficiario_seleccionado');
        $this->emit('beneficiarioSelected', $this->selectedBeneficiario);
    }
    public function render()
    {
        $beneficiarios = beneficiarios::where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('cedula', 'like', '%' . $this->search . '%')
            ->get();
        return view('livewire.donaciones.select-beneficiario', [
            'beneficiarios' => $beneficiarios
        ]);
    }
}
