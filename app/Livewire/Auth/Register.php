<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'email' => 'required|email|unique:users,email|max:100',
        'password' => 'required|min:6|confirmed',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'is_admin' => false,
        ]);

        Auth::login($user);

        return redirect()->route('customer.dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('components.layouts.app');
    }
}
