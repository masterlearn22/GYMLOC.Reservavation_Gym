<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;
use App\Models\GymPriceCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\FacadesLog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showGymRequestForm()
    {
        return view('user.requestGym');
    }

    public function submitGymRequest(Request $request)
    {
        try {
            // Validasi data
            $validatedData = $request->validate([
                'nama_gym' => 'required|string|max:50',
                'city' => 'required|string|max:50',
                'alamat' => 'required|string|max:150',
                'fasilitas' => 'nullable|string|max:200',
                'deskripsi' => 'nullable|string|max:200',
                'jam_operasional' => 'required|string|max:100',
                'kategori' => 'required|array|min:1|max:5',
                'kategori.*' => 'required|string|max:50',
                'durasi' => 'nullable|array',
                'durasi.*' => 'nullable|integer|min:0',
                'harga' => 'required|array|min:1|max:5',
                'harga.*' => 'required|integer|min:0',
            ]);

            // Log data yang akan digunakan untuk membuat gym
            Log::info('Data Gym yang akan dibuat:', [
                'nama_gym' => $validatedData['nama_gym'],
                'city' => $validatedData['city'],
                'alamat' => $validatedData['alamat'],
                'fasilitas' => $validatedData['fasilitas'] ?? null,
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'jam_operasional' => $validatedData['jam_operasional']
            ]);

            // Mulai transaksi database
            DB::beginTransaction();

            // Buat record gym baru
            $gym = Gym::create([
                'id_user' => Auth::id(), // Tambahkan id_user
                'nama_gym' => $validatedData['nama_gym'],
                'alamat' => $validatedData['alamat'],
                'city' => $validatedData['city'],
                'koordinat' => null,
                'jarak' => null,
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'fasilitas' => $validatedData['fasilitas'] ?? null,
                'foto' => null,
                'jam_operasional' => $validatedData['jam_operasional']
            ]);

            // Log ID gym yang baru dibuat
            Log::info('Gym berhasil dibuat dengan ID: ' . $gym->gym_id);

            // Proses kategori harga
            $pricingData = [];

            // Gunakan array_values untuk memastikan indeks berurutan
            $kategoris = array_values($validatedData['kategori']);
            $durasis = array_values($validatedData['durasi'] ?? []);
            $hargas = array_values($validatedData['harga']);

            foreach ($kategoris as $index => $kategoriNama) {
                // Cari atau buat kategori
                $category = GymPriceCategory::firstOrCreate(
                    ['nama_kategori' => $kategoriNama],
                    ['nama_kategori' => $kategoriNama]
                );

                // Siapkan data pricing
                $pricingData[] = [
                    'gym_id' => $gym->gym_id,
                    'category_id' => $category->id,
                    'durasi' => $durasis[$index] ?? null,
                    'harga' => $hargas[$index],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            // Log data pricing
            Log::info('Data Pricing yang akan dimasukkan:', $pricingData);

            // Masukkan pricing ke database
            DB::table('gym_prices')->insert($pricingData);

            // Update status user
            $user = Auth::user();
            $user->is_gym_requested = true;
            $user->save();

            // Commit transaksi
            DB::commit();

            return redirect()->route('profile.index')
                ->with('success', 'Permohonan untuk menjadi pihak gym berhasil dikirim.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::error('Validation Errors:', $e->errors());

            // Tangani kesalahan validasi
            return back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Terdapat kesalahan dalam pengisian form');
        } catch (\Exception $e) {
            // Log error secara detail
            Log::error('Gym Creation Error: ' . $e->getMessage());
            Log::error('Gym Creation Trace: ' . $e->getTraceAsString());

            // Rollback transaksi jika terjadi error
            DB::rollBack();

            return back()
                ->with('error', 'Gagal mengajukan permohonan gym: ' . $e->getMessage())
                ->withInput();
        }
    }
}
