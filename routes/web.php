<?php

use App\Models\Unit;
use App\Models\Guest;
use App\Models\Inventory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

// Rooms
Route::get('/rooms', function () {
    return view('rooms/index', ['title' => 'Rooms', 'rooms' => Inventory::all()]);
});

Route::get('/rooms/create', function () {
    return view('rooms/create', ['title' => 'Create Room']);
});

Route::get('/rooms/{room}', function (Inventory $room) {
    return view('rooms/show', ['title' => 'view room', 'room' => $room]);
});

// Guests
Route::get('/guests', function () {
    return view('guests/index', ['title' => 'Guests', 'guests' => Guest::all()]);
});

Route::get('/guests/create', function () {
    return view('guests/create', ['title' => 'Create Guest']);
});

Route::get('/guests/{guest}', function (Guest $guest) {
    return view('guests/show', ['title' => $guest->name, 'guest' => $guest,]);
});

// Reservations
Route::get('/reservations', function () {
    return view('reservations/index', ['title' => 'Reservations']);
});

// Housekeeping
Route::get('/housekeeping', function () {
    return view('housekeeping/index', ['title' => 'Housekeeping']);
});

// Sales
// Finance
// General Manager
