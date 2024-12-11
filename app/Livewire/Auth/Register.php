<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $names, $lastnames, $gender, $email, $password, $password_confirmation;

    public function register()
    {
        
        
        $this->validate([
            'names' => 'required|string|max:255',
            'lastnames' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'required|string',
            'password' => 'required|string|min:8|same:password_confirmation',
            'password_confirmation' => 'required|string|min:8',
        ]);

        $user = User::create([
            'names' => $this->names,
            'lastnames' => $this->lastnames,
            'gender' => $this->gender,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        

        return redirect()->route('login');

    }


    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.guest');
    }
}
