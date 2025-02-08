<?php

namespace App\Http\Livewire\Stock;

use App\Models\Medicinas;
use Livewire\Component;

class StockList extends Component
{
    public $medicinas, $nombre, $medicina_id;
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
    public function render()
    {
        return view('livewire.stock.stock-list');
    }
}
