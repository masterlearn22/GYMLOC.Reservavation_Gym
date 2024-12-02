<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function submitGymRequest(Request $request)
    {
        $request->validate([
            'gym_name' => 'required|string|max:255',
            'gym_description' => 'required|string|max:500',
        ]);
    
        // Menyimpan data permohonan ke database atau menandai status is_gym_requested
        $user = Auth::user();
        $user->is_gym_requested = true;
        $user->gym_name = $request->gym_name;
        $user->gym_description = $request->gym_description;
        $user->save();
    
        return redirect()->route('home')->with('success', 'Permohonan untuk menjadi pihak gym berhasil dikirim.');
    }

    public function showTopUpForm()
    {
        if (Auth::user()->id_role == 'gym') {
            return redirect()->route('profile.index')->with('error', 'Gym cannot top up saldo.');
        }
        
        return view('profile.topup');
    }

    // Proses top-up saldo
    public function processTopUp(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
        ]);

        $user = Auth::user();
        $user->saldo += $request->amount;
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Saldo berhasil ditambahkan!');
    }
    
}
