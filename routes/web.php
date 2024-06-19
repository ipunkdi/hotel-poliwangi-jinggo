<?php

use App\Http\Controllers\GuestController;
use App\Models\Unit;
use App\Models\Guest;
use App\Models\Inventory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

// Rooms
Route::get('/rooms', function () {
    return view('rooms.index', ['title' => 'Rooms', 'rooms' => Inventory::all()]);
});

Route::get('/rooms/create', function () {
    return view('rooms.create', ['title' => 'Create Room']);
});

Route::get('/rooms/{room}', function (Inventory $room) {
    return view('rooms.show', ['title' => 'view room', 'room' => $room]);
});

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
