<?php

namespace App\Livewire\admin;

use App\Livewire\admin\forms\UserForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public UserForm $form;

    public function render()
    {
        return view('livewire.admin.users', [
            'users' => User::paginate(10)
        ]);
    }

    public function edit(User $user): void
    {
        $this->form->setData($user);
    }

    public function update(): void
    {
        $this->authorize('update', Auth::user());
        $this->form->update();
    }

    public function resetForm(): void
    {
        $this->form->resetForm();
    }
}
