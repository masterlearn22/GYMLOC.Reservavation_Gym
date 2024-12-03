<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     */
    // Di dalam controller
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    /**
     * Menampilkan halaman edit profil.
     */
    public function edit($id)
    {
        // Pastikan user yang sedang login adalah pemilik profil
        $user = Auth::user();
        if ($user->id_user != $id) {
            return redirect()->route('profile.index')
                ->with('error', 'Anda tidak memiliki izin');
        }
    
        return view('profile.edit', compact('user'));
    }

    /**
     * Memperbarui profil pengguna.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id_user . ',id_user',
            'email' => 'required|email|unique:users,email,' . $user->id_user . ',id_user',
            'password' => 'nullable|min:6|confirmed',
            'profile_photo' => 'nullable|image|max:10480' // Maks 2MB
        ]);
    
        // Proses update data dasar
        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];
    
        // Handle password update (opsional)
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
    
        // Handle foto profil
        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo) {
                Storage::delete('public/' . $user->profile_photo);
            }
    
            // Simpan foto baru
            $photoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            
            // Simpan path tanpa 'public/'
            $user->profile_photo = str_replace('public/', '', $photoPath);
        }
    
        // Simpan perubahan
        $user->save();
    
        // Logging untuk debugging
        Log::info('Profile updated with photo', [
            'id_user' => $user->id_user,
            'name' => $user->name,
            'profile_photo' => $user->profile_photo
        ]);
    
        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
}