<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Country;

class UserEdit extends Component
{
    public $user;
    public $names;
    public $lastnames;
    public $email;
    public $gender;
    public $address;
    public $phone;
    public $country_id;
    public $profile_incomplete;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);

        $this->names = $this->user->names;
        $this->lastnames = $this->user->lastnames;
        $this->email = $this->user->email;
        $this->gender = $this->user->gender;
        $this->address = $this->user->address;
        $this->phone = $this->user->phone;
        $this->country_id = $this->user->country_id;
    }

    public function updateUser()
    {

        $this->validate([
            'names' => 'required|string|max:255',
            'lastnames' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
            'gender' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'country_id' => 'required',
        ]);

        $this->user->names = $this->names;
        $this->user->lastnames = $this->lastnames;
        $this->user->email = $this->email;
        $this->user->gender = $this->gender;
        $this->user->address = $this->address;
        $this->user->phone = $this->phone;
        $this->user->country_id = $this->country_id;
        $this->user->profile_incomplete = false;


        $this->user->save();

        session()->flash('message', 'User updated successfully!');
        return redirect()->route('user.index', ['id' => $this->user->id]);
    }

    public function render()
    {
        $countries = Country::all();
        return view('livewire.user-edit', compact('countries'))->layout('layouts.app');
    }
}
