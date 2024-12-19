<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Gym;
use Auth;

class ReservationController extends Controller
{
    // Menampilkan halaman reservasi
    public function index()
    {
        $reservations = Reservation::all(); // Ambil semua data gym
        
        return view('reservasi.index', compact('reservations'));
    }
    public function views()
    {
        $reservations = Reservation::all(); // Ambil semua data gym
        
        return view('reservasi.admin', compact('reservations'));
    }
}
