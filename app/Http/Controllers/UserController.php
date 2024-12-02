<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
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

   
    
   
}
