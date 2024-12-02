<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $gymRequests = User::where('is_gym_requested', true)->get(); // Ambil semua user yang mengajukan permohonan menjadi gym
        return view('admin.dashboard', compact('gymRequests'));
    }

    public function approveGym($userId)
    {
        $user = User::findOrFail($userId);

        // Set role pengguna menjadi 'gym' dan reset status permohonan
        $user->id_role = 2; // Asumsi id_role untuk gym adalah 2
        $user->is_gym_requested = false;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Pengguna berhasil diubah menjadi pihak gym.');
    }
    public function rejectGym($userId)
    {
        $user = User::findOrFail($userId);

        // Set is_gym_requested menjadi false untuk menunjukkan bahwa permohonan ditolak
        $user->is_gym_requested = false;
        $user->gym_name = null;  // Menghapus informasi terkait gym (opsional)
        $user->gym_description = null;  // Menghapus deskripsi gym (opsional)
        $user->save();

        return redirect()->route('admin.dashboard')->with('error', 'Permohonan gym ditolak.');
    }
}
