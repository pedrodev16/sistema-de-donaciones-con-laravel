<?php

namespace App\Http\Livewire\Beneficiario;

use App\Models\beneficiarios;
use Livewire\Component;

class BeneficiarioList extends Component
{

    public $confirmingDelete = false;
    public $id_beneficiario;
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



    public function delete($confirmingDelete)
    {
        if ($confirmingDelete) {
            $beneficiario = beneficiarios::findOrFail($this->id_beneficiario);


            // Luego eliminar la medicina
            $beneficiario->delete();
            $this->cargabeneficiario();
            $this->confirmingDelete = false;
        }
    }
    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->id_beneficiario = $id;
    }


    public function render()
    {
        return view('livewire.beneficiario.beneficiario-list');
    }
}
