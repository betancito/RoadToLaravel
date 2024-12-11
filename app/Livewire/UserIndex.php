<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $names, $lastnames, $email, $gender, $address, $phone, $country;

    public function deleteUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully.');
        }
    }

    public function render()
    {
        $users = User::with('country')// This is to stablish the country relationship in the database
            ->when($this->names, fn($query) => $query->where('names', 'like', '%'.$this->names.'%'))
            ->when($this->lastnames, fn($query) => $query->where('lastnames', 'like', '%'.$this->lastnames.'%'))
            ->when($this->email, fn($query) => $query->where('email', 'like', '%'.$this->email.'%'))
            ->when($this->gender, fn($query) => $query->where('gender', $this->gender))
            ->when($this->country, fn($query) => $query->where('country_id', $this->country))
            ->paginate(10);

        return view('livewire.user-index', compact('users'))->layout('layouts.app');
    }

    
}
