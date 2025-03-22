<?php

namespace App\Livewire\Settings\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mary\Traits\Toast;

class DeleteUser extends Component
{
    use Toast;
    // public string $userId;
    // public string $name;
    // public string $email;
    // public bool $isAdmin;
    public $user;
    public string $password = '';

    public function mount($id): void
    {
        $this->user = User::find($id);
        // $this->userId = $user->id;
        // $this->name = $user->name;
        // $this->email = $user->email;
        // $this->isAdmin = $user->is_admin;
    }

    public function deleteUser(): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        if (Auth::check())
        {

            User::destroy($this->user->id);
            $this->redirect(route('settings.users.list'));
        }

        $this->warning(__('Invalid password, try again'));
    }
}
