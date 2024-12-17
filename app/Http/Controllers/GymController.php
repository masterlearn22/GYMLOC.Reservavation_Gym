<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class GymController extends Controller
{
    public function index(Request $request)
    {
        // Filter berdasarkan kota jika ada
        $query = Gym::query();
        
        if ($request->has('city')) {
            $query->where('alamat', 'like', "%{$request->city}%");
        }

        $gyms = $query->paginate(6);

        return view('gym.list', ['gyms' => $gyms]);
    }

    public function show($gym_id)
    {
        $gym = Gym::findOrFail($gym_id);
    
        // Ambil harga-harga yang terkait dengan gym ini
        $prices = DB::table('gym_prices')
            ->join('gym_price_categories', 'gym_prices.category_id', '=', 'gym_price_categories.id')
            ->where('gym_prices.gym_id', $gym_id)
            ->select('gym_price_categories.nama_kategori', 'gym_prices.durasi', 'gym_prices.harga','gym_prices.category_id')
            ->get();
    
        return view('user.detailGym', [
            'gym' => $gym,
            'prices' => $prices // Kirim data harga ke view
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_gym' => 'required|string|max:50',
            'alamat' => 'required|string|max:150',
            'fasilitas' => 'required|string|max:200',
            'deskripsi' => 'nullable|string|max:255',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
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
            'jam_buka' => $validated['jam_buka'],
            'jam_tutup' => $validated['jam_tutup'],
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

    public function edit($gym_id)
{
    $gym = Gym::findOrFail($gym_id);

    // Pastikan yang mengakses adalah gym yang sama
    if (Auth::user()->id_role != '2' || Auth::user()->id_user != $gym->id_user) {
        return redirect()->route('profile.index')->with('error', 'Unauthorized');
    }

    // Ambil harga-harga sebelumnya
    $previousPrices = DB::table('gym_prices')
        ->join('gym_price_categories', 'gym_prices.category_id', '=', 'gym_price_categories.id')
        ->where('gym_id', $gym_id)
        ->get();

    return view('pihakgym.edit', compact('gym', 'previousPrices'));
}

    public function update(Request $request, $gym_id)
    {
        $validated = $request->validate([
            'nama_gym' => 'required|string|max:50',
            'city' => 'required|string|max:100',
            'alamat' => 'required|string|max:150',
            'fasilitas' => 'required|string|max:200',
            'deskripsi' => 'nullable|string|max:255',
            'jam_operasional' => 'required|string|max:100',
            'kategori' => 'required|array',
            'kategori.*' => 'required|string|max:50',
            'durasi' => 'required|array',
            'durasi.*' => 'nullable|integer|min:0',
            'harga' => 'required|array',
            'harga.*' => 'required|numeric|min:0',
        ]);
    
        // Mulai transaksi database
        DB::beginTransaction();
    
        try {
            // Update data gym
            $gym = Gym::findOrFail($gym_id);
            $gym->update([
                'nama_gym' => $validated['nama_gym'],
                'city' => $validated['city'],
                'alamat' => $validated['alamat'],
                'fasilitas' => $validated['fasilitas'],
                'deskripsi' => $validated['deskripsi'],
                'jam_operasional' => $validated['jam_operasional'],
            ]);
    
            // Hapus harga lama
            DB::table('gym_prices')->where('gym_id', $gym_id)->delete();
    
            // Simpan harga baru
            foreach ($validated['kategori'] as $index => $kategori) {
                // Cari atau buat kategori
                $categoryId = DB::table('gym_price_categories')
                    ->where('nama_kategori', $kategori)
                    ->value('id');
    
                if (!$categoryId) {
                    $categoryId = DB::table('gym_price_categories')->insertGetId([
                        'nama_kategori' => $kategori,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
    
                // Simpan harga baru
                DB::table('gym_prices')->insert([
                    'gym_id' => $gym_id,
                    'category_id' => $categoryId,
                    'durasi' => $validated['durasi'][$index] ?? null,
                    'harga' => $validated['harga'][$index],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
    
            // Commit transaksi
            DB::commit();
    
            return redirect()->route('pihakgym.edit', $gym_id)
                ->with('success', 'Gym dan harga berhasil diupdate');
    
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
    
            // Log error
            Log::error('Gym Update Error: ' . $e->getMessage());
    
            return redirect()->back()
                ->with('error', 'Gagal mengupdate gym. Silakan coba lagi.')
                ->withInput();
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $city = $request->input('city');

        // Query pencarian gym berdasarkan nama dan kota
        $gyms = Gym::where('nama_gym', 'like', "%{$query}%")
            ->when($city, function ($q) use ($city) {
                return $q->where('city', $city);
            })
            ->paginate(10);

        return view('user.daftargym', compact('gyms', 'query', 'city'));
    }

    public function list()
    {
        // Tampilkan daftar gym dengan pagination
        $gyms = Gym::paginate(12);
        return view('user.daftargym', compact('gyms'));
    }
}
