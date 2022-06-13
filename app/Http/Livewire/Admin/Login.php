<?php

namespace App\Http\Livewire\Admin;

// use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username, $password;

    public function render()
    {
        return view('livewire.admin.login')->layout('layouts.admin-login');
    }

    public function login()
    {
        // $admins = new Admin();
        $this->validate([
            'username' => ['required', 'string', 'max:12', 'min:3'],
            'password' => ['required', 'string', 'max:12', 'min:3'],
        ]);
        $admins = Auth::guard('admin')->attempt(['username' => $this->username, 'password' => $this->password]);
        if ($admins) {
            return redirect(route('admin.dashboard'));
            session()->flash('success', 'Login Successfully');
        } else {
            session()->flash('error', 'Invalid Creditional');
        }
    }
}
