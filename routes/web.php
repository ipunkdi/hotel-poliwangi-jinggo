<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

// Rooms
Route::get('/rooms', function () {
    return view('rooms', ['title' => 'Rooms', 'rooms' => [
        [
            'id' => 1,
            'room_number' => '201',
            'room_type' => 'Standard',
            'status' => 'Occupied'
        ],
        [
            'id' => 2,
            'room_number' => '202',
            'room_type' => 'Standard',
            'status' => 'Available'
        ],
        [
            'id' => 3,
            'room_number' => '203',
            'room_type' => 'Standard',
            'status' => 'Reserved'
        ],
        [
            'id' => 4,
            'room_number' => '204',
            'room_type' => 'Standard',
            'status' => 'Available'
        ],
        [
            'id' => 5,
            'room_number' => '205',
            'room_type' => 'Standard',
            'status' => 'Occupied'
        ],
    ]]);
});


Route::get('/rooms/{id}', function($id) {
    $rooms = [
        [
            'id' => 1,
            'room_number' => '201',
            'room_type' => 'Standard',
            'status' => 'Occupied'
        ],
        [
            'id' => 2,
            'room_number' => '202',
            'room_type' => 'Standard',
            'status' => 'Available'
        ],
        [
            'id' => 3,
            'room_number' => '203',
            'room_type' => 'Standard',
            'status' => 'Reserved'
        ],
        [
            'id' => 4,
            'room_number' => '204',
            'room_type' => 'Standard',
            'status' => 'Available'
        ],
        [
            'id' => 5,
            'room_number' => '205',
            'room_type' => 'Standard',
            'status' => 'Occupied'
        ],
    ];

    $room = Arr::first($rooms, function ($room) use ($id) {
        return $room['id'] == $id;
    });

    return view('room', ['title' => 'view room', 'room' => $room]);
});

Route::get('/create', function () {
    return view('create', ['title' => 'Create Room']);
});

// Guests
Route::get('/guests', function () {
    return view('guests', ['title' => 'Guests']);
});

// Reservations
Route::get('/reservations', function () {
    return view('reservations', ['title' => 'Reservations']);
});

// Sales
// Finance
// General Manager
