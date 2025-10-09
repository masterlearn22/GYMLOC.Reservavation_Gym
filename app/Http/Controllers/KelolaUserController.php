<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KelolaUserController extends Controller
{
    public function index()
    {
        
        $users = User::with('role')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = DB::table('role')->get(); // Mengambil data role dari tabel role
        return view('admin.user.create', compact('roles')); // Arahkan ke view tambah_user
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:60',
            'username' => 'required|string|max:60|unique:users',
            'password' => 'required|string|min:8',
            'email' => 'required|email|max:60|unique:users',
            'id_role' => 'required|exists:role,id_role'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Enkripsi password
            'email' => $request->email,
            'id_role' => $request->id_role // Menyimpan role yang dipilih
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    
    }

    public function edit(User $user)
    {
        
        $role = DB::table('role')->get();
        return view('admin.user.edit', compact('role','user'));
    }

    public function update(Request $request, User $user)
    {
        //dd($request->all());
        Log::info('Memulai proses store');
        Log::info('Request data:', $request->all());
        Log::info('Files:', $request->allFiles());
    //    dd($request->all());
        $request->validate([
            'name' => 'required|string|max:60',
            'username' => 'required|string|unique:users,username,' . $user->id_user . ',id_user',
            'email' => 'required|string|unique:users,email,' . $user->id_user . ',id_user',
            'id_role' => 'required|exists:role,id_role' // Validasi untuk role
        ]);
    
        // Update user data             
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'id_role' => $request->id_role // Update role
        ]);
    
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
        
    }
    

    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }


    public function show($id){
        //
    }

    public function test(){
        $users = User::with('role')->get();
        return view('admin.user.test', compact('users'));
    }

}
