<?php


namespace App\Http\Livewire\Medicina;

use App\Models\Medicinas;
use App\Models\stock;
use Livewire\Component;

class MedicinaForm extends Component
{
    //registro de  nombre, descripcion, tipo, presentacion, laboratorio
    public $nombre;
    public $descripcion;
    public $tipo;
    public $presentacion;
    public $laboratorio;
    public $dosis;
    public $tipo_dosis;
    public $medicina_id;

    protected $listeners = ['edit_form' => 'cargamedicinas'];

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'tipo' => 'required',
        'dosis' => 'nullable|string',
        'tipo_dosis' => 'nullable|string',
        'presentacion' => 'required',
        'laboratorio' => 'required'
    ];

    // public function save()
    // {
    //     $this->validate();
    //     try {
    //         Medicinas::create([
    //             'nombre' => $this->nombre,
    //             'descripcion' => $this->descripcion,
    //             'tipo' => $this->tipo,
    //             'presentacion' => $this->presentacion,
    //             'laboratorio' => $this->laboratorio,
    //         ]);

    //         $this->reset();
    //         $this->emit('ok', ['message' => 'Medicina creada']);
    //     } catch (\Exception $e) {
    //         $this->emit('error', ['message' => 'Error al crear medicina']);
    //         // $this->dispatch('medicinaCreated');
    //     }
    // }

    public function cargamedicinas($id)
    {
        $medicina = Medicinas::findOrFail($id);
        $this->nombre = $medicina->nombre;
        $this->descripcion = $medicina->descripcion;
        $this->tipo = $medicina->tipo;
        $this->presentacion = $medicina->presentacion;
        $this->laboratorio = $medicina->laboratorio;
        $this->medicina_id = $medicina->id;
        $this->dosis = $medicina->dosis ?? null;
        $this->tipo_dosis = $medicina->tipo_dosis ?? null;
    }


    public function save()
    {
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'tipo' => 'required',
            'presentacion' => 'required',
            'laboratorio' => 'required',
            'dosis' => 'nullable|string',
            'tipo_dosis' => 'nullable|string'
        ]);

        if ($this->medicina_id) {

            $medicina = Medicinas::findOrFail($this->medicina_id);

            try {
                $medicina->update([
                    'nombre' => $this->nombre,
                    'descripcion' => $this->descripcion,
                    'tipo' => $this->tipo,
                    'presentacion' => $this->presentacion,
                    'laboratorio' => $this->laboratorio,
                    'dosis' => $this->dosis,
                    'tipo_dosis' => $this->tipo_dosis
                ]);
                $this->emit('ok', ['message' => 'Medicina actualizada']);
            } catch (\Exception $e) {
                $this->emit('error', ['message' => 'Error al actualizar medicina']);
            }
        } else {
            try {
                $medicina = Medicinas::create([
                    'nombre' => $this->nombre,
                    'descripcion' => $this->descripcion,
                    'tipo' => $this->tipo,
                    'presentacion' => $this->presentacion,
                    'laboratorio' => $this->laboratorio,
                    'id_usuario' => auth()->user()->id,
                    'dosis' => $this->dosis,
                    'tipo_dosis' => $this->tipo_dosis
                ]);
                stock::create([
                    'medicina_id' => $medicina->id,
                    'cantidad' => 0,
                    'ubicacion' => 'Bodega',
                    'observacion' => 'Medicina nueva',
                    'estado' => 'No Disponible',
                    'id_usuario' => auth()->user()->id,
                ]);
                $this->emit('ok', ['message' => 'Medicina creada']);
            } catch (\Exception $e) {
                $this->emit('error', ['message' => 'Error al crear medicina']);
            }
        }

        // Reset form fields
        $this->reset([
            'medicina_id',
            'nombre',
            'descripcion',
            'tipo',
            'presentacion',
            'laboratorio'
        ]);
        $this->emit('medicinaCreated');
    }


    public function render()
    {
        return view('livewire.medicina.medicina-form');
    }
}
