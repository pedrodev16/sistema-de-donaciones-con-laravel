<?php

namespace App\Http\Livewire\Donaciones;

use App\Models\beneficiarios;
use App\Models\donaciones;
use App\Models\Medicinas;
use App\Models\stock;
use Livewire\Component;

class FormularioDonacion extends Component
{

    public $beneficiario_id;
    public $beneficiario_data;

    public $items = [];
    public $nombre;
    public $apellido;
    public $direccion;
    public $telefono;
    public $discapacidad;
    public $ci;
    public $email;
    public $fecha_nacimiento;
    public $sexo;
    public $edad;
    public $estado_civil;
    public $tipo_sangre;
    public $enfermedades;
    public $alergias;
    public $mostrar_form = false;

    protected $listeners = ['beneficiarioSelected', 'addmedic'];

    // public function mount()
    // {
    //     $this->nombre = "";
    //     $this->apellido = "";
    //     $this->direccion = "";
    //     $this->telefono = "";
    //     $this->email = "";
    //     $this->fecha_nacimiento = "";
    //     $this->sexo = "";
    //     $this->edad = "";
    //     $this->estado_civil = "";
    //     $this->tipo_sangre = "";
    //     $this->enfermedades = "";
    //     $this->alergias = "";
    // }

    public function addmedic($medicamentoId)
    {
        $medicamento = Medicinas::find($medicamentoId);
        $stock = Stock::where('medicina_id', $medicamentoId)->sum('cantidad');

        if (!$medicamento) {
            return;
        }

        $itemIndex = collect($this->items)->search(function ($item) use ($medicamentoId) {
            $itemId = (int) $item['id'];
            $medId = (int) $medicamentoId;



            return $itemId === $medId;
        });




        if ($itemIndex !== false) {
            // Incrementa la cantidad si el medicamento ya está en el carrito
            if ($this->items[$itemIndex]['cantidad'] < $stock) {
                $this->items[$itemIndex]['cantidad']++;
            } else {
                $this->emit('error', ['message' => 'La Cantidad es mayor mayor que el stock disponible']);
            }
        } else {
            // Agrega el medicamento al carrito si no está
            if ($stock > 0) {
                $this->items[] = [
                    'id' => $medicamento->id,
                    'nombre' => $medicamento->nombre,
                    'dosificacion' => $medicamento->dosis . ' ' . $medicamento->tipo_dosis,
                    'codigo' => $medicamento->codigo_de_barras,
                    'cantidad' => 1,
                    'stock' => $stock,
                ];
            } else {

                $this->emit('error', ['message' => 'La Cantidad es  mayor que el stock disponible']);
            }
        }
    }



    public function updateCantidad($index, $cantidad)
    {
        if ($cantidad > $this->items[$index]['stock']) {
            $this->emit('error', ['message' =>
            'La Cantidad es mayor que el stock disponible']);
            return;
        }

        $this->items[$index]['cantidad'] = $cantidad;
    }

    public function removeMedicamento($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items); // reindexar array
    }

    public function beneficiarioSelected($beneficiario_id)
    {
        $this->mostrar_form = true;


        $this->beneficiario_id = $beneficiario_id;

        $usuario = beneficiarios::findOrFail($beneficiario_id);

        $this->nombre = $usuario->nombre;
        $this->apellido = $usuario->apellido;
        $this->direccion = $usuario->direccion;
        $this->telefono = $usuario->telefono;
        $this->email = $usuario->email;
        $this->fecha_nacimiento = $usuario->fecha_nacimiento;
        $this->sexo = $usuario->sexo;
        $this->edad = $usuario->edad;
        $this->discapacidad = $usuario->discapacidad;
        $this->estado_civil = $usuario->estado_civil;
        $this->tipo_sangre = $usuario->tipo_sangre;
        $this->enfermedades = $usuario->enfermedades;
        $this->alergias = $usuario->alergias;
    }



    public function registrarDonacion()
    {
        $medicinas = json_encode($this->items);
        $cantidad_items = count($this->items);
        foreach ($this->items as $item) {
            $stock = Stock::where('medicina_id', $item['id'])->first();
            if ($stock && $stock->cantidad >= $item['cantidad']) {
                $stock->cantidad -= $item['cantidad'];
                $stock->save();
            } else {
                $this->emit('error', ['message' => 'La Cantidad es mayor que el stock disponible']);
                return;
            }
        }

        donaciones::create([
            'beneficiario_id' => $this->beneficiario_id,
            'medicinas' => $medicinas,
            'id_usuario' => auth()->user()->id,
            'cantidad' => $cantidad_items,
        ]);

        $this->emit('ok', ['message' => 'Registro exitoso']);
        return redirect()->route('donaciones')->with('success', 'Registro exitoso');
        $this->reset([
            'beneficiario_id',
            'beneficiario_data',
            'items',
            'nombre',
            'apellido',
            'direccion',
            'telefono',
            'ci',
            'email',
            'fecha_nacimiento',
            'sexo',
            'edad',
            'discapacidad',
            'estado_civil',
            'tipo_sangre',
            'enfermedades',
            'alergias',
        ]);
        $this->items = [];
    }
    public function render()
    {
        return view('livewire.donaciones.formulario-donacion', ['items' => $this->items]);
    }
}
