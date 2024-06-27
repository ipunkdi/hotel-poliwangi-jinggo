<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UnitGroupController;
use App\Http\Controllers\UnitController;

// Dashboard
Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

// Room
Route::resource('/room/unit-groups', UnitGroupController::class);
Route::resource('/room/units', UnitController::class);

// Guests
Route::resource('/guests', GuestController::class);

// Reservations
Route::get('/reservations', function () {
    return view('reservations.index', ['title' => 'Reservations']);
});

// Housekeeping
Route::get('/housekeeping', function () {
    return view('housekeeping.index', ['title' => 'Housekeeping']);
});

// Sales
// Finance
// General Manager
