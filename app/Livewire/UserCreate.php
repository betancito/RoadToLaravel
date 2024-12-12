<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserCreate extends Component
{
    public $user;
    public $names;
    public $lastnames;
    public $email;
    public $gender;
    public $address;
    public $phone;
    public $country_id;



    public function createUser()
    {

        $this->validate([
            'names' => 'required|string|max:255',
            'lastnames' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'gender' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'country_id' => 'required|exists:countries,id',
        ]);

        $user = new User();

        $user->names = $this->names;
        $user->lastnames = $this->lastnames;
        $user->email = $this->email;
        $user->gender = $this->gender;
        $user->address = $this->address;
        $user->phone = $this->phone;
        $user->country_id = $this->country_id;

        $user->save();

        session()->flash('message', 'User created successfully!');


        return redirect()->route('user.index');
    }

    public function render()
    {           
        $countries = Country::all();
        return view('livewire.user-create', compact('countries'))->layout('layouts.app');
    }
}
