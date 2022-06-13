<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;
    public function render()
    {
        return view('livewire.user.login')->layout('layouts.user-login');
    }

    public function login()
    {
        $this->validate([
            'email' => ['email', 'required'],
            'password' => ['required', 'string', 'min:3', 'max:12']
        ]);
        $users = Auth::attempt(['email' => $this->email, 'password' => $this->password]);
        if ($users) {
            if (Auth::user()->remember_token == "0") {
                session()->flash('error', 'Please Verifiy your email');
            } else {
                return redirect(route('user.dashboard'));
            }
        } else {
            session()->flash('error', 'Invalid Email and password');
        }
    }
}
