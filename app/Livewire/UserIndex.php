<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $names, $lastnames, $email, $gender, $address, $phone, $country;



    public function render()
    {
        return view('livewire.user-index')->layout('layouts.app');
    }
}
