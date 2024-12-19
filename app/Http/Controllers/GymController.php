<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GymController extends Controller
{
    public function index(Request $request)
    {
        dd($request->all());
        // Filter berdasarkan kota jika ada
        $query = Gym::query();
        
        if ($query->where('approved_at') != null){
        if ($request->has('city')) {
            $query->where('alamat', 'like', "%{$request->city}%");
        }
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

    public function edit($id_user)
    {
        // Ambil data gym berdasarkan id_user
        $gym = Gym::where('id_user', $id_user)->first(); // Menggunakan first() untuk mendapatkan satu record
    
        // Periksa apakah gym ditemukan
        if (!$gym) {
            return redirect()->back()->with('error', 'Gym tidak ditemukan.');
        }
    
        // Ambil harga-harga sebelumnya
        $previousPrices = DB::table('gym_prices')
            ->join('gym_price_categories', 'gym_prices.category_id', '=', 'gym_price_categories.id')
            ->where('gym_id', $gym->gym_id) // Pastikan Anda menggunakan gym_id yang benar
            ->get();
    
        return view('gym.edit', compact('gym', 'previousPrices'));
    }

    public function update(Request $request, $gym_id)
    {
       //dd($request->file('foto'));
       $gym = gym::findOrFail($gym_id);

        $validated = $request->validate([
            'nama_gym' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'alamat' => 'required|string|max:150',
            'fasilitas' => 'nullable|string|max:200',
            'deskripsi' => 'nullable|string|max:200',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'kategori' => 'required|array|min:1|max:5',
            'kategori.*' => 'required|string|max:50',
            'durasi' => 'nullable|array',
            'durasi.*' => 'nullable|integer|min:0',
            'harga' => 'required|array|min:1|max:5',
            'harga.*' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10048',
        ]);

        $gambarPathArray = json_decode($gym->foto, true) ?? [];

        // Hapus gambar yang dipilih
        if ($request->has('delete_gambar') && !empty($request->input('delete_gambar'))) {
            foreach ($request->input('delete_gambar') as $gambar) {
                if (Storage::exists('public/' . $gambar)) {
                    Storage::delete('public/' . $gambar);
                    $gambarPathArray = array_diff($gambarPathArray, [$gambar]);
                }
            }
        }

        // Unggah gambar baru
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $gambarPath = $file->store('attachments', 'public');
                $gambarPathArray[] = $gambarPath;
            }
        }
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
                'jam_buka' => $validated['jam_buka'],
                'jam_tutup' => $validated['jam_tutup'],
                'foto' => !empty($gambarPathArray) ? json_encode($gambarPathArray) : null,
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
    
            return redirect()->route('gym.edit', $gym_id)
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

    public function list(Request $request)
    {
        // Ambil input dari request
        $city = $request->input('city');
        $fasilitas = $request->input('fasilitas');
    
        // Query dasar untuk semua gym dengan status aktif
        $query = Gym::where('status', 'aktif'); // Memastikan hanya gym dengan status 'aktif' yang diambil
    
        // Tambahkan filter berdasarkan kota (jika ada)
        if ($city) {
            $query->where('city', $city);
        }
    
        // Tambahkan filter berdasarkan fasilitas (jika ada)
        if ($fasilitas) {
            $query->where(function ($q) use ($fasilitas) {
                foreach ($fasilitas as $facility) {
                    $q->orWhere('fasilitas', 'LIKE', '%' . $facility . '%');
                }
            });
        }
    
        // Dapatkan data gym yang difilter
        $gyms = $query->paginate(12);
    
        // Hitungan untuk statistik (opsional)
        $gymCount = Gym::where('status', 'aktif')->count(); // Hitung gym aktif
        $facilityCount = Gym::where('status', 'aktif')->whereNotNull('fasilitas')->distinct('fasilitas')->count(); 
        $cityCount = Gym::where('status', 'aktif')->distinct('city')->count('city'); 
    
        return view('user.daftargym', compact('gymCount', 'facilityCount', 'cityCount', 'gyms'));
    }
}
