<?php

namespace App\Http\Controllers;
use App\Models\Gym;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $gymCount = Gym::count(); 
        $facilityCount = Gym::whereNotNull('fasilitas')->distinct('fasilitas')->count(); 
        $cityCount = Gym::distinct('city')->count('city'); 
    
        return view('IntroWebsite.index', compact('gymCount', 'facilityCount', 'cityCount'));
    }
}
