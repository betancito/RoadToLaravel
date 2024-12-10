<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\UserIndex;
use App\Livewire\UserDetails;
use App\Livewire\UserEdit;

Route::get('/', function () {
    return view('welcome');
});

//UserRoutes
Route::get('/users', UserIndex::class)->name('user.index');
Route::get('/user/{id}', UserDetails::class)->name('user.details');
Route::get('/users/edit/{id}', UserEdit::class)->name('user.edit');
