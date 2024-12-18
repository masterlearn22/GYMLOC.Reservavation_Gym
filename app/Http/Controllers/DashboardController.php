<?php

namespace App\Http\Controllers;
use App\Models\Gym;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input dari request
        $city = $request->input('city');
        $fasilitas = $request->input('fasilitas');

        // Query dasar untuk semua gym
        $query = Gym::query();

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
        $gymCount = Gym::count(); 
        $facilityCount = Gym::whereNotNull('fasilitas')->distinct('fasilitas')->count(); 
        $cityCount = Gym::distinct('city')->count('city'); 

        // Kirim data ke view
        return view('IntroWebsite.index', compact('gymCount', 'facilityCount', 'cityCount', 'gyms'));
    }

}
