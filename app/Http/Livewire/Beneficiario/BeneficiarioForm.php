<?php

namespace App\Http\Livewire\Beneficiario;

use App\Models\Beneficiarios;
use Livewire\Component;

class BeneficiarioForm extends Component
{
    public $usuario_id;
    public $nombre, $apellido, $direccion, $cedula, $telefono, $email, $fecha_nacimiento, $sexo, $edad, $estado_civil, $discapacidad, $tipo_sangre, $enfermedades, $alergias;

    protected $listeners = ['edit_form' => 'cargarUsuario'];

    public function cargarUsuario($id)
    {
        $usuario = Beneficiarios::findOrFail($id);
        $this->usuario_id = $usuario->id;
        $this->nombre = $usuario->nombre;
        $this->apellido = $usuario->apellido;
        $this->direccion = $usuario->direccion;
        $this->discapacidad = $usuario->discapacidad;
        $this->telefono = $usuario->telefono;
        $this->cedula = $usuario->cedula;
        $this->email = $usuario->email;
        $this->fecha_nacimiento = $usuario->fecha_nacimiento;
        $this->sexo = $usuario->sexo;
        $this->edad = $usuario->edad;
        $this->estado_civil = $usuario->estado_civil;
        $this->tipo_sangre = $usuario->tipo_sangre ?? null; // Opcional
        $this->enfermedades = $usuario->enfermedades ?? null; // Opcional
        $this->alergias = $usuario->alergias ?? null; // Opcional
    }

    public function save()
    {
        $this->validate(
            [
                'nombre' => 'required|string',
                'apellido' => 'required|string',
                'direccion' => 'required|string',
                'telefono' => 'required|string',
                'cedula' => 'required',
                'email' => 'email|nullable',
                'fecha_nacimiento' => 'required|date',
                'sexo' => 'required|string',
                'edad' => 'required|integer|min:0',
                'estado_civil' => 'required|string',
                'tipo_sangre' => 'nullable|string',
                'enfermedades' => 'nullable|string',
                'discapacidad' => 'nullable|string',
                'alergias' => 'nullable|string',
            ]
        );

        if ($this->usuario_id) {
            $beneficiario = Beneficiarios::findOrFail($this->usuario_id);

            try {
                $beneficiario->update([
                    'nombre' => $this->nombre,
                    'apellido' => $this->apellido,
                    'direccion' => $this->direccion,
                    'cedula' => $this->cedula,
                    'telefono' => $this->telefono,
                    'email' => $this->email,
                    'fecha_nacimiento' => $this->fecha_nacimiento,
                    'sexo' => $this->sexo,
                    'edad' => $this->edad,
                    'eliminado' => 'no',
                    'estado_civil' => $this->estado_civil,
                    'discapacidad' => $this->discapacidad,
                    'tipo_sangre' => $this->tipo_sangre,
                    'enfermedades' => $this->enfermedades,
                    'alergias' => $this->alergias
                ]);
                $this->emit('ok', ['message' => 'Usuario actualizado']);
            } catch (\Exception $e) {
                $this->emit('error', ['message' => 'Error al actualizar el usuario']);
            }
        } else {
            try {
                $beneficiario = Beneficiarios::create([
                    'nombre' => $this->nombre,
                    'apellido' => $this->apellido,
                    'direccion' => $this->direccion,
                    'cedula' => $this->cedula,
                    'telefono' => $this->telefono,
                    'email' => $this->email,
                    'fecha_nacimiento' => $this->fecha_nacimiento,
                    'sexo' => $this->sexo,
                    'edad' => $this->edad,
                    'eliminado' => 'no',
                    'discapacidad' => $this->discapacidad,
                    'estado_civil' => $this->estado_civil,
                    'tipo_sangre' => $this->tipo_sangre,
                    'enfermedades' => $this->enfermedades,
                    'alergias' => $this->alergias,
                    'id_usuario' => auth()->user()->id,
                ]);
                $this->emit('ok', ['message' => 'Usuario creado']);
            } catch (\Exception $e) {
                $this->emit('error', ['message' => 'Error al crear el usuario']);
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
