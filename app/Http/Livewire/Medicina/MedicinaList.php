<?php

namespace App\Http\Livewire\Medicina;

use App\Models\Medicinas;
use Livewire\Component;

class MedicinaList extends Component
{


    public $medicinas, $nombre, $medicina_id;
    public $ver_vencidas = false;
    public $cantidad_medicinas_vencidas;
    protected $listeners = ['medicinaCreated' => 'cargamedicinas'];
    public function mount()
    {

        $this->cantidad_medicinas_vencidas = Medicinas::where('fecha_vencimiento', '<', now())->count();
        $this->cargamedicinas();
    }

    public function showExpiredMedicines()
    {
        $this->ver_vencidas = true;
        $this->cargamedicinas();
    }
    public function cargamedicinas()
    {
        if ($this->ver_vencidas) {
            $this->medicinas = Medicinas::where('fecha_vencimiento', '<', now())->get();
        } else {

            $this->medicinas = Medicinas::where('fecha_vencimiento', '>', now())->get();
        }
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
        $medicina = Medicinas::findOrFail($id);

        // Eliminar filas dependientes en stocks
        $medicina->stocks()->delete();

        // Luego eliminar la medicina
        $medicina->delete();
        $this->cargamedicinas();
    }


    public function render()
    {
        return view('livewire.medicina.medicina-list');
    }
}
