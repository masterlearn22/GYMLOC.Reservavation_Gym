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
    public function edit($id)
    {
        // Pastikan ID pengguna cocok dengan yang sedang login
        $user = Auth::user();
        if ($user->id_user != $id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengedit profil ini.');
        }

        return view('profile.edit', compact('user'));
    }

    /**
     * Menampilkan halaman riwayat transaksi pengguna.
     */
    public function transaksi()
    {
        // Logika untuk menampilkan riwayat transaksi
        return view('profile.transaksi');
    }

    /**
     * Memperbarui data profil pengguna.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->id_user != $id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id_user . ',id_user',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id_user . ',id_user',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return redirect()->route('profile.index', $user->id_user)->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Memperbarui foto profil pengguna.
     */
    public function updatePhoto(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->id_user != $id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            // Menghapus foto profil lama jika ada
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Menyimpan foto profil baru
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
            $user->save();
        }

        return redirect()->route('profile.index', $user->id_user)->with('success', 'Foto profil berhasil diperbarui.');
    }

    /**
     * Menampilkan halaman pengaturan pengguna.
     */
    public function settings()
    {
        $user = Auth::user();
        return view('profile.settings', compact('user'));
    }

    /**
     * Logika untuk menghapus akun pengguna.
     */
    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        // Konfirmasi penghapusan akun
        $request->validate([
            'password' => 'required|string',
        ]);

        // Verifikasi password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password tidak sesuai.']);
        }

        // Hapus akun pengguna dan data terkait
        $user->delete();

        // Logout setelah akun dihapus
        Auth::logout();

        return redirect('/')->with('success', 'Akun berhasil dihapus.');
    }
}
