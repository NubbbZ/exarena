<?php

namespace App\Livewire\admin;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Validate]
    public $id, $username, $email, $role;

    public function rules()
    {
        return [
            'username' => [
                'required', 
                'string', 
                'lowercase', 
                'min:4', 
                'max:30', 
                'unique:users,username,'.$this->id.',id'
            ],
            'email' => [
                'required', 
                'string',
                'email', 
                'max:255', 
                'unique:users,email,'.$this->id.',id'
            ],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.admin.users', [
            'users' => User::paginate(10)
        ]);
    }

    public function edit(User $user)
    {
        $this->fill( 
            $user->only([
                'id', 
                'username', 
                'email', 
                'role'
            ]), 
        );
    }

    public function save()
    {
        $this->validate();
        
        $user = User::find($this->id);
        $this->authorize('update', $user);
        $user->update([
            'username' => strtolower($this->username),
            'email' => strtolower($this->email),
            'role' => $this->role
        ]);
        $this->resetModal();
        
        session()->flash('status', 'User was successfully updated!');
    }

    public function resetModal()
    {
        $this->reset();
        $this->dispatch('closeModal');
    }
}
