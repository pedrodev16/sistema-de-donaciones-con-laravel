<?php

namespace App\Http\Livewire\Beneficiario;

use App\Models\beneficiarios;
use Livewire\Component;

class BeneficiarioList extends Component
{



    public $beneficiario, $nombre, $medicina_id;

    protected $listeners = ['beneficiarioCreated' => 'cargabeneficiario'];
    public function mount()
    {
        $this->cargabeneficiario();
    }
    public function cargabeneficiario()
    {
        $this->beneficiario = beneficiarios::all();
    }


    public function edit($id)
    {
        $this->emit('edit_form', $id);
    }



    public function delete($id)
    {
        $beneficiario = beneficiarios::findOrFail($id);


        // Luego eliminar la medicina
        $beneficiario->delete();
        $beneficiario->cargamedicinas();
    }

    public function render()
    {
        return view('livewire.beneficiario.beneficiario-list');
    }
}
