<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use App\Actions\Fortify\PasswordValidationRules;
use Livewire\Component;

class UserSettings extends Component
{
    use PasswordValidationRules;

    public User $user;
    #[Validate]
    public string $email;
    public string $password;
    public string $password_confirmation;

    public function rules()
    {
        return [
            'email' => [
                'required', 
                'email', 
                'unique:users,email,'.$this->user->id.',id'
            ],
            'password' => $this->passwordRules()
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(User $user)
    {
        $this->user = $user;  
        $this->fill( 
            $user->only(
                'email',
            ), 
        );
    }

    public function render()
    {
        return view('livewire.user_settings');
    }

    public function changeEmail ()
    {
        if ($this->user->email === $this->email) return;

        $validatedData = $this->validateOnly('email');
        $this->authorize('update', $this->user);
        $this->user->update($validatedData);
        session()->flash('status', 'Your Email was successfully updated!');
    }

    public function changePassword ()
    {
        $validatedData = $this->validateOnly('password');
        $hashedPassword = Hash::make($validatedData['password']);
        $this->authorize('update', $this->user);
        $this->user->update([
            'password' => $hashedPassword
        ]);
        session()->flash('status', 'Your password was successfully changed!');
    }
    
    public function closeAccount ()
    {
        Auth::logout();
        $this->user->delete();
        redirect(route('welcome'));
    }
}
