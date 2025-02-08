<?php

namespace App\Http\Livewire\Medicina;

use App\Models\Medicinas;
use Livewire\Component;

class MedicinaList extends Component
{


    public $medicinas, $nombre, $medicina_id;

    protected $listeners = ['medicinaCreated' => 'cargamedicinas'];
    public function mount()
    {
        $this->cargamedicinas();
    }
    public function cargamedicinas()
    {
        $this->medicinas = Medicinas::all();
    }


    public function edit($id)
    {
        $this->emit('edit_form', $id);
    }

    public function update()
    {
        $medicina = Medicinas::findOrFail($this->medicina_id);
        $medicina->nombre = $this->nombre;
        $medicina->save();
    }

    public function delete($id)
    {
        Medicinas::findOrFail($id)->delete();
        $this->cargamedicinas();
    }


    public function render()
    {
        return view('livewire.medicina.medicina-list');
    }
}
