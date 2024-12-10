<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserDetails extends Component
{
    public $user;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.user-details')->layout('layouts.app');
    }
}
