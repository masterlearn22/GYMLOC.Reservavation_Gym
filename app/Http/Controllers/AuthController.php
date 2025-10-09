<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function TampilanRegistrasi(){
        $role = DB::table('role')->get();
        return view('auth.register', compact('role'));
    }
    public function Registrasi(Request $request)
{
    $request->validate([
        'username' => 'required|string|max:255|unique:users,username',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    // Pastikan role dengan id_role = 1 ada di database
    $roleExists = DB::table('role')->where('id_role', 1)->exists();
    if (!$roleExists) {
        return back()->withErrors(['message' => 'Role tidak ditemukan. Silakan tambahkan role terlebih dahulu.']);
    }

    try {
        // Gunakan transaksi database untuk memastikan data tersimpan dengan benar
        DB::beginTransaction();

        // Membuat pengguna baru dengan id_role default 1
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role' => 1 // Menetapkan role default ke 'user'
        ]);

        // Ambil nama role berdasarkan id_role
        $roleName = DB::table('role')->where('id_role', $user->id_role)->value('role');

        // Commit transaksi jika tidak ada error
        DB::commit();

        // Login user setelah registrasi
        Auth::login($user);

        // Simpan nama role ke dalam session
        session(['role' => $roleName]);

        return redirect()->route('log'); 
    } catch (\Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        DB::rollBack();

        return back()->withErrors(['message' => 'Registrasi gagal: ' . $e->getMessage()]);
    }
}

    
    

    public function TampilanLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'string','email'],
            'password' => ['required', 'string'],
        ]);  
    
        if(Auth::attempt($credentials)){
            // Simpan session untuk 'name' dan 'role'
            session(['name' => Auth::user()->name]);
    
            // Mengambil nama role berdasarkan id_role
            $Role = DB::table('role')->where('id_role', Auth::user()->id_role)->value('role');
            
            // Menyimpan nama role ke dalam session
            session(['role' => $Role]);
    
            // Regenerasi session ID untuk keamanan
            $request->session()->regenerate();
    
            return redirect('/');
        } else {
            return back()->withErrors(['message' => 'Login failed']);
        }
    }
    

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
