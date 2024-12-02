<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GymController extends Controller
{
    public function index()
    {
        $gyms = DB::table('gyms')
            ->leftJoin('gym_prices', 'gyms.gym_id', '=', 'gym_prices.gym_id')
            ->leftJoin('gym_price_categories', 'gym_prices.category_id', '=', 'gym_price_categories.id')
            ->select(
                'gyms.gym_id',
                'gyms.nama_gym',
                'gyms.alamat',
                'gyms.fasilitas',
                'gyms.deskripsi',
                'gyms.jam_operasional',
                'gym_price_categories.nama_kategori',
                'gym_prices.durasi',
                'gym_prices.harga'
            )
            ->get()
            ->groupBy('gym_id'); // Mengelompokkan data berdasarkan gym_id

        return view('editgym', compact('gyms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_gym' => 'required|string|max:50',
            'alamat' => 'required|string|max:150',
            'fasilitas' => 'required|string|max:200',
            'deskripsi' => 'nullable|string|max:255',
            'jam_operasional' => 'required|string|max:100',
            'kategori' => 'required|array',
            'kategori.*' => 'required|string|max:50',
            'durasi' => 'required|array',
            'durasi.*' => 'nullable|integer|min:0',
            'harga' => 'required|array',
            'harga.*' => 'required|integer|min:0',
        ]);

        // Simpan data gym
        $gymId = DB::table('gyms')->insertGetId([
            'nama_gym' => $validated['nama_gym'],
            'alamat' => $validated['alamat'],
            'fasilitas' => $validated['fasilitas'],
            'deskripsi' => $validated['deskripsi'],
            'jam_operasional' => $validated['jam_operasional'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Simpan kategori dan harga

        foreach ($validated['kategori'] as $index => $kategori) {
            // Cari atau buat kategori
            $categoryId = DB::table('gym_price_categories')->where('nama_kategori', $kategori)->value('id');
            if (!$categoryId) {
                $categoryId = DB::table('gym_price_categories')->insertGetId([
                    'nama_kategori' => $kategori,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Simpan harga
            DB::table('gym_prices')->insert([
                'gym_id' => $gymId,
                'category_id' => $categoryId,
                'durasi' => $validated['durasi'][$index] ?? null,
                'harga' => $validated['harga'][$index],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->intended('editgyms')->with('success', 'Gym berhasil ditambahkan beserta harga!');
    }

    public function edit($id)
    {
        $gym = Gym::findOrFail($id);

        // Pastikan yang mengakses adalah gym yang sama
        if (Auth::user()->id_role != 'gym' || Auth::user()->id_user != $gym->user_id) {
            return redirect()->route('profile.index')->with('error', 'Unauthorized');
        }

        return view('gym.edit', compact('gym'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_gym' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'fasilitas' => 'required|string',
            'deskripsi' => 'required|string',
            'jam_operasional' => 'required|string',
        ]);

        $gym = Gym::findOrFail($id);
        $gym->update($request->all());

        return redirect()->route('gym.edit', $gym->id)->with('success', 'Gym berhasil diupdate');
    }
}
