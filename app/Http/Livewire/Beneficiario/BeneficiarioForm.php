<?php

namespace App\Http\Livewire\Beneficiario;

use App\Models\beneficiarios;
use Livewire\Component;

class BeneficiarioForm extends Component
{

    public $usuario_id;
    public $nombre, $apellido, $direccion, $telefono, $email, $fecha_nacimiento, $sexo, $edad, $estado_civil, $tipo_sangre, $enfermedades, $alergias;

    protected $listeners = ['edit_form' => 'cargarUsuario'];



    public function cargarUsuario($id)
    {
        $usuario = beneficiarios::findOrFail($id);
        $this->usuario_id = $usuario->id;
        $this->nombre = $usuario->nombre;
        $this->apellido = $usuario->apellido;
        $this->direccion = $usuario->direccion;
        $this->telefono = $usuario->telefono;
        $this->email = $usuario->email;
        $this->fecha_nacimiento = $usuario->fecha_nacimiento;
        $this->sexo = $usuario->sexo;
        $this->edad = $usuario->edad;
        $this->estado_civil = $usuario->estado_civil;
        $this->tipo_sangre = $usuario->tipo_sangre;
        $this->enfermedades = $usuario->enfermedades;
        $this->alergias = $usuario->alergias;
    }

    public function save()
    {
        $this->validate(
            [
                'nombre' => 'required|string',
                'apellido' => 'required|string',
                'direccion' => 'required|string',
                'telefono' => 'required|string',
                'email' => 'required|email|',
                'fecha_nacimiento' => 'required|date',
                'sexo' => 'required|string',
                'edad' => 'required|integer|min:0',
                'estado_civil' => 'required|string',
                'tipo_sangre' => 'required|string',
                'enfermedades' => 'nullable|string',
                'alergias' => 'nullable|string',
            ]

        );


        if ($this->usuario_id) {

            $beneficiario = beneficiarios::findOrFail($this->usuario_id);

            try {
                $beneficiario->update([
                    'nombre' => $this->nombre,
                    'apellido' => $this->apellido,
                    'direccion' => $this->direccion,
                    'telefono' => $this->telefono,
                    'email' => $this->email,
                    'fecha_nacimiento' => $this->fecha_nacimiento,
                    'sexo' => $this->sexo,
                    'edad' => $this->edad,
                    'estado_civil' => $this->estado_civil,
                    'tipo_sangre' => $this->tipo_sangre,
                    'enfermedades' => $this->enfermedades,
                    'alergias' => $this->alergias
                ]);
                $this->emit('ok', ['message' => 'Medicina actualizada']);
            } catch (\Exception $e) {
                $this->emit('error', ['message' => 'Error al actualizar medicina']);
            }
        } else {
            try {
                $medicina = beneficiarios::create([
                    'nombre' => $this->nombre,
                    'apellido' => $this->apellido,
                    'direccion' => $this->direccion,
                    'telefono' => $this->telefono,
                    'email' => $this->email,
                    'fecha_nacimiento' => $this->fecha_nacimiento,
                    'sexo' => $this->sexo,
                    'edad' => $this->edad,
                    'estado_civil' => $this->estado_civil,
                    'tipo_sangre' => $this->tipo_sangre,
                    'enfermedades' => $this->enfermedades,
                    'alergias' => $this->alergias
                ]);
                $this->emit('ok', ['message' => 'Medicina creada']);
            } catch (\Exception $e) {
                $this->emit('error', ['message' => 'Error al crear medicina']);
            }
        }

        $this->reset();
        $this->emit('ok', ['message' => 'Usuario guardado/actualizado']);
        $this->emit('beneficiarioCreated');
    }
    public function render()
    {
        return view('livewire.beneficiario.beneficiario-form');
    }
}
