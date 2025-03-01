<?php

namespace App\Http\Livewire\Usuarios;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    public $users;
    public function mount()
    {
        $this->users = ModelsUser::all();
    }

    public function editar($id)
    {
        $this->emit('editar', $id);
    }
    public function eliminar($id)
    {
        $this->emit('eliminar', $id);
    }
    public function render()
    {

        return view('livewire.usuarios.user', ['users' => $this->users]);
    }
}
