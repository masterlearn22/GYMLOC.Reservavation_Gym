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
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    /**
     * Menampilkan halaman edit profil.
     */
    public function edit($id_user)
    {
        // Pastikan user yang sedang login adalah pemilik profil
        $user = Auth::user();
        if ($user->id_user != $id_user) {
            return redirect()->route('profile.index')
                ->with('error', 'Anda tidak memiliki izin');
        }
    
        return view('profile.edit', compact('user'));
    }

    /**
     * Memperbarui profil pengguna.
     */
    public function update(Request $request, $id_user)
    {
        try {
            // Log input untuk debugging
            Log::info('Update Profile Request', [
                'id_user' => $id_user,
                'input' => $request->all()
            ]);
    
            // Cari user berdasarkan id_user
            $user = User::findOrFail($id_user);
    
            // Validasi
            $validationRules = [
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,'.$id_user.',id_user',
                'email' => 'nullable|email|max:255|unique:users,email,'.$id_user.',id_user',
                'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'password' => 'nullable|min:8|confirmed'
            ];
    
            $request->validate($validationRules);
    
            // Update data
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
    
            // Handle password
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
    
            // Handle profile photo
            if ($request->hasFile('profile_photo')) {
                // Hapus foto lama jika ada
                if ($user->profile_photo) {
                    Storage::disk('public')->delete($user->profile_photo);
                }
    
                // Simpan foto baru
                $path = $request->file('profile_photo')->store('profile_photos', 'public');
                $user->profile_photo = $path;
            }
    
            // Simpan perubahan
            $user->save();
    
            // Refresh data user di session
            Auth::setUser($user);
    
            // Log keberhasilan
            Log::info('Profile updated successfully', [
                'id_user' => $user->id_user,
                'name' => $user->name
            ]);
    
            return redirect()->route('profile.index')
                ->with('success', 'Profil berhasil diperbarui');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log error validasi
            Log::error('Validation Error', [
                'errors' => $e->errors()
            ]);
    
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
    
        } catch (\Exception $e) {
            // Log error umum
            Log::error('Profile Update Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
    
            return redirect()->back()
                ->with('error', 'Gagal memperbarui profil: ' . $e->getMessage())
                ->withInput();
        }
    }
}