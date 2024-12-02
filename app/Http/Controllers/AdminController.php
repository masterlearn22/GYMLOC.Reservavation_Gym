<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\User;
use App\Models\GymPrice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function dashboard()
    {
        $gymRequests = User::where('is_gym_requested', true)
            ->select('id_user', 'name', 'email', 'created_at')
            ->get();

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
                'gym_prices.durasi',
                'gym_prices.harga',
                'gym_price_categories.nama_kategori'
            )
            ->whereNull('gyms.approved_at')
            ->get()
            ->groupBy('gym_id');

        return view('admin.dashboard', [
            'gymRequests' => $gymRequests,
            'gyms' => $gyms
        ]);
    }

    public function approveGym($gymId)
    {
        DB::beginTransaction();
        try {
            // Gunakan findOrFail dengan primary key yang benar
            $gym = Gym::where('gym_id', $gymId)->firstOrFail();

            // Log untuk debugging
            Log::info('Gym ditemukan:', [
                'gym_id' => $gym->gym_id,
                'nama_gym' => $gym->nama_gym
            ]);

            // Cari user terkait gym
            $user = User::find($gym->id_user);

            // Update status gym menjadi disetujui
            $gym->approved_at = now();
            $gym->save();

            // Update user jika ada
            if ($user) {
                $user->is_gym_requested = false;
                $user->save();
            }

            DB::commit();

            return redirect()->route('admin.dashboard')
                ->with('success', 'Gym berhasil disetujui.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log error secara detail
            Log::error('Approve Gym Error: ' . $e->getMessage());
            Log::error('Gym ID: ' . $gymId);
            Log::error('Trace: ' . $e->getTraceAsString());

            return redirect()->route('admin.dashboard')
                ->with('error', 'Gagal menyetujui gym: ' . $e->getMessage());
        }
    }


    public function rejectGym($gymId)
    {
        DB::beginTransaction();
        try {
            // Gunakan findOrFail dengan primary key yang benar
            $gym = Gym::where('gym_id', $gymId)->firstOrFail();

            // Cari user terkait gym
            $user = User::find($gym->id_user);

            // Hapus harga terkait
            GymPrice::where('gym_id', $gym->gym_id)->delete();

            // Hapus gym
            $gym->delete();

            // Update user jika ada
            if ($user) {
                $user->is_gym_requested = false;
                $user->save();
            }

            DB::commit();

            return redirect()->route('admin.dashboard')
                ->with('error', 'Permohonan gym ditolak.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log error secara detail
            Log::error('Reject Gym Error: ' . $e->getMessage());
            Log::error('Gym ID: ' . $gymId);
            Log::error('Trace: ' . $e->getTraceAsString());

            return redirect()->route('admin.dashboard')
                ->with('error', 'Gagal menolak gym: ' . $e->getMessage());
        }
    }

    public function userDetail($id)
    {
        $user = User::where('id_user', $id)->firstOrFail();
        return view('admin.user-detail', compact('user'));
    }
}
