<?php 

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function dashboard()
    {
        $gymRequests = User::where('is_gym_requested', true)
            ->select('id', 'name', 'email', 'created_at')
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

    public function approveGym($id)
    {
        DB::beginTransaction();
        try {
            // Temukan user
            $user = User::findOrFail($id);

            // Temukan gym yang terkait dengan user
            $gym = Gym::where('id_user', $id)->firstOrFail();

            // Update status gym menjadi disetujui
            $gym->approved_at = now();
            $gym->save();

            // Set role pengguna menjadi 'gym' dan reset status permohonan
            $user->id_role = 2; // Asumsi id_role untuk gym adalah 2
            $user->is_gym_requested = false;
            $user->save();

            DB::commit();

            return redirect()->route('admin.dashboard')
                ->with('success', 'Pengguna berhasil diubah menjadi pihak gym.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Approve Gym Error: ' . $e->getMessage());

            return redirect()->route('admin.dashboard')
                ->with('error', 'Gagal menyetujui permohonan gym: ' . $e->getMessage());
        }
    }

    public function rejectGym($userId)
    {
        DB::beginTransaction();
        try {
            // Temukan user
            $user = User::findOrFail($userId);

            // Temukan gym yang terkait dengan user
            $gym = Gym::where('user_id', $userId)->first();

            // Hapus gym jika ada
            if ($gym) {
                // Hapus harga terkait
                DB::table('gym_prices')->where('gym_id', $gym->gym_id)->delete();
                
                // Hapus gym
                $gym->delete();
            }

            // Reset status permohonan
            $user->is_gym_requested = false;
            $user->save();

            DB::commit();

            return redirect()->route('admin.dashboard')
                ->with('error', 'Permohonan gym ditolak.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Reject Gym Error: ' . $e->getMessage());

            return redirect()->route('admin.dashboard')
                ->with('error', 'Gagal menolak permohonan gym: ' . $e->getMessage());
        }
    }

    public function userDetail($id)
{
    $user = User::findOrFail($id);
    return view('admin.user-detail', compact('user'));
}
}