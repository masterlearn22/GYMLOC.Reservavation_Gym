<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    // Menampilkan halaman reservasi
    public function index()
    {
        $userId = Auth::user()->id_user; // Ambil ID pengguna yang sedang login

        // Ambil reservasi yang sesuai dengan id_user
        $reservations = Reservation::where('id_user', $userId)->get();// Ambil semua data gym
        
        return view('reservasi.index', compact('reservations'));
    }
}
