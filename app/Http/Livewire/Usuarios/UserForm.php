<?php

namespace App\Http\Livewire\Usuarios;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $editMode = false;
    public $userId;
    public  $users;


    protected $listeners = ['editar' => 'edit', 'eliminar' => 'delete'];
    public function mount()
    {
        $this->users = User::all();
    }

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            session()->flash('message', 'User successfully registered.');
            $this->resetForm();
            $this->users = User::all();
        } catch (\Exception $e) {
            session()->flash('error', 'There was an error registering the user.');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->editMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->userId,
            'password' => 'nullable|string|min:8',
        ]);

        try {
            $user = User::findOrFail($this->userId);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password ? Hash::make($this->password) : $user->password,
            ]);

            session()->flash('message', 'User successfully updated.');
            $this->resetForm();
            $this->users = User::all();
        } catch (\Exception $e) {
            session()->flash('error', 'There was an error updating the user.');
        }
    }

    public function delete($id)
    {
        try {
            User::destroy($id);
            session()->flash('message', 'User successfully deleted.');
            $this->users = User::all();
        } catch (\Exception $e) {
            session()->flash('error', 'There was an error deleting the user.');
        }
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->editMode = false;
        $this->userId = null;
    }

    public function render()
    {
        return view('livewire.usuarios.user-form', ['users' => $this->users]);
    }
}
