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
        return view('jenis_user.index', compact('Roles'));
    }

    public function create()
    {
        $Role = Role::all();
        return view('jenis_user.create', compact('Role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_JENIS_USER' => 'required|unique:jenis_user',
            'JENIS_USER' => 'required',
        ]);

        Role::create([
            'ID_JENIS_USER' => $request->ID_JENIS_USER,
            'JENIS_USER' => $request->JENIS_USER,
            'CREATE_BY' =>  Auth::user()->name ?? 'system',
            'CREATE_DATE' => now(),
        ]);

        return redirect()->route('jenis_user.index')->with('success', 'Jenis User created successfully.');
    }

    public function edit($id)
    {
        $Role = Role::findOrFail($id);
        return view('jenis_user.edit', compact('Role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'JENIS_USER' => 'required',
        ]);

        $Role = Role::findOrFail($id);
        $Role->update([
            'JENIS_USER' => $request->JENIS_USER,
            'UPDATE_BY' =>  Auth::user()->name ?? 'system',
            'UPDATE_DATE' => now(),
        ]);

        return redirect()->route('jenis_user.index')->with('success', 'Jenis User updated successfully.');
    }

    public function destroy($id)
    {
        $Role = Role::findOrFail($id);
        $Role->update(['DELETE_MARK' => 'Y']);
        $Role->delete();

        return redirect()->route('jenis_user.index')->with('success', 'Jenis User deleted successfully.');
    }
}
