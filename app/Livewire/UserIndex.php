<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm = '';

    public $names, $lastnames, $email, $gender, $address, $phone, $country;

    public function deleteUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully.');
        }
    }

    public function search(){
        
        if (!empty($this->searchTerm)) {
            $q = User::query(); 
            return $q
            ->where('names', 'like', '%' . $this->searchTerm . '%') 
            ->orWhere('lastnames', 'like', '%' . $this->searchTerm . '%') 
            ->orWhere('email', 'like', '%' . $this->searchTerm . '%') 
            ->orWhere('gender', 'like', '%' . $this->searchTerm . '%') 
            ->orWhereHas('country', function ($q) {
                $q->where('name', 'like', '%' . $this->searchTerm . '%');
            })
            ->paginate(10);
            
        }else{
            return User::with('country')->paginate(10);// This is to stablish the country relationship in the database
        };
    }


    public function render()
    {
        $users = $this->search();

        return view('livewire.user-index', ['users' => $users])->layout('layouts.app');
    }
}
