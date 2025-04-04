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
        //eliminado=no
        $beneficiarios = beneficiarios::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('cedula', 'like', '%' . $this->search . '%');
        })
            ->where('eliminado', 'no') // Este filtro es global a toda la búsqueda
            ->get();
        return view('livewire.donaciones.select-beneficiario', [
            'beneficiarios' => $beneficiarios
        ]);
    }
}
