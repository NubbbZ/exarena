<?php

namespace App\Livewire\admin\forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

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

    public function setData (User $user)
    {
        $this->user = $user;
        $this->fill(
            $user->only([
                'id', 
                'username',
                'email',
                'role'
            ]), 
        );
    }

    public function update(): void
    {
        $this->validate();
        
        $user = User::find($this->id);

        $user->update([
            'username' => strtolower($this->username),
            'email' => strtolower($this->email),
            'role' => $this->role
        ]);
        $this->resetForm();
        
        session()->flash('status', 'User was successfully updated!');
    }

    public function resetForm(): void
    {
        $this->reset();
        $this->resetValidation();
        $this->component->dispatch('closeModal');
    }
}