<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\UserIndex;
use App\Livewire\UserDetails;

Route::get('/', function () {
    return view('welcome');
});

//UserRoutes
Route::get('/users', UserIndex::class);
Route::get('/user/{id}', UserDetails::class)->name('user.details');
