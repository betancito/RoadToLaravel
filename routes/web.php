<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\UserIndex;

Route::get('/', function () {
    return view('welcome');
});

//UserRoutes
Route::get('/users', UserIndex::class);
