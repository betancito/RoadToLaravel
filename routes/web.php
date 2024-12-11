<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\UserIndex;
use App\Livewire\UserDetails;
use App\Livewire\UserEdit;
use App\Livewire\UserCreate;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;

Route::get('/', function () {
    return view('welcome');
});

//UserRoutes
Route::get('/users/edit/{id}', UserEdit::class)->name('user.edit');
Route::get('/user/create', UserCreate::class)->name('user.create');
Route::get('/user/{id}', UserDetails::class)->name('user.details');
Route::get('/users', UserIndex::class)->name('user.index');

//Auth Routes
Route::get('/login', Login::class)->name('auth.login');
Route::get('/register', Register::class)->name('auth.register');

