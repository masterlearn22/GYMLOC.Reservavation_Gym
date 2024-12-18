<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $jenisUsers = Role::all();
        return view('role.index', compact('Roles'));
    }

    public function create()
    {
        $Role = Role::all();
        return view('role.create', compact('Role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_role' => 'required|unique:role',
            'role' => 'required',
        ]);

        Role::create([
            'id_role' => $request->id_role,
            'role' => $request->role,
            'CREATE_BY' =>  Auth::user()->name ?? 'system',
            'CREATE_DATE' => now(),
        ]);

        return redirect()->route('role.index')->with('success', 'Jenis User created successfully.');
    }

    public function edit($id)
    {
        $Role = Role::findOrFail($id);
        return view('role.edit', compact('Role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
        ]);

        $Role = Role::findOrFail($id);
        $Role->update([
            'role' => $request->role,
            'UPDATE_BY' =>  Auth::user()->name ?? 'system',
            'UPDATE_DATE' => now(),
        ]);

        return redirect()->route('role.index')->with('success', 'Jenis User updated successfully.');
    }

    public function destroy($id)
    {
        $Role = Role::findOrFail($id);
        $Role->update(['DELETE_MARK' => 'Y']);
        $Role->delete();

        return redirect()->route('role.index')->with('success', 'Jenis User deleted successfully.');
    }
}
