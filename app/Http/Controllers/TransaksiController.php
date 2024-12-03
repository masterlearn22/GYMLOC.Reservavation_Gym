<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Transaksi::where('id_user', $user->id);

        // Filter berdasarkan tipe transaksi
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan tanggal
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        $transactions = $query->orderBy('created_at', 'desc')
                              ->paginate(10);

        return view('profile.transaksi', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transaksi::findOrFail($id);

        // Pastikan hanya pemilik transaksi yang bisa melihat
        if ($transaction->id_user !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('transactions.detail', compact('transaction'));
    }
    
    public function showTopUpForm()
    {
        return view('profile.topup');
    }

    public function processTopUp(Request $request)
    {
        // Validasi jumlah top up
        $request->validate([
            'amount' => 'required|numeric|min:10000',
            'payment_method' => 'required',
        ]);

        // Lakukan proses top up di sini
        // Contoh: simpan data transaksi ke database

        return redirect()->route('profile.topup')->with('success', 'Top up berhasil diproses!');
    }
}