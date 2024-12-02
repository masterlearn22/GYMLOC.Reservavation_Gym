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
    public function Registrasi(Request $request){
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        // Membuat pengguna baru dengan id_role default 1
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role' => 1  // Menetapkan role default ke 'user'
        ]);
    
        Auth::login($user);
    
        if ($user->save()) {
            // Mengambil nama role berdasarkan id_role
            $Role = DB::table('role')->where('id_role', $user->id_role)->value('role');
            
            // Menyimpan nama role ke dalam session
            session(['role' => $Role]);
    
            return redirect()->intended('login');
        } else {
            return back()->withErrors(['message' => 'Failed to create user']);
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
    
            return redirect('index');
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
