<?php

namespace App\Http\Livewire\Stock;

use App\Models\stock;
use Livewire\Component;

class StockForm extends Component
{
    public $medicina_id;

    public $stock_id;
    public $cantidad;
    public $ubicacion;
    public $observacion;
    public $estado;
    protected $listeners = ['edit_form' => 'cargarstock'];
    private $stock;

    public function cargarstock($id)
    {
        $this->stock = Stock::find($id);

        if ($this->stock) {
            $this->stock_id = $this->stock->id;
            $this->medicina_id = $this->stock->medicina_id;
            $this->cantidad = $this->stock->cantidad;
            $this->ubicacion = $this->stock->ubicacion;
            $this->observacion = $this->stock->observacion;
            $this->estado = $this->stock->estado;
        } else {
            $this->emit('error', ['message' => 'Stock no encontrado']);
        }
    }


    protected $rules = [
        'medicina_id' => 'required',
        'cantidad' => 'required|integer|min:1',
        'ubicacion' => 'required',
        'observacion' => 'required',
        'estado' => 'required',
    ];

    public function save()
    {
        $this->validate();

        $this->stock = Stock::find($this->stock_id);

        if (!$this->stock) {
            $this->emit('error', ['message' => 'Stock no encontrado']);
            return;
        }

        if ($this->cantidad <= $this->stock->cantidad) {
            $this->emit('error', ['message' => 'La nueva cantidad debe ser mayor que la cantidad existente']);
            return;
        }

        try {
            $this->stock->update([
                'cantidad' => $this->cantidad,
                'ubicacion' => $this->ubicacion,
                'observacion' => $this->observacion,
                'estado' => $this->estado,
            ]);

            $this->reset();
            $this->emit('ok', ['message' => 'Stock actualizado']);
        } catch (\Exception $e) {
            $this->emit('error', ['message' => 'Error al actualizar stock']);
        }
    }


    public function render()
    {
        return view('livewire.stock.stock-form');
    }
}
