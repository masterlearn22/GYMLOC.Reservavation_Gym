<?php

namespace App\Http\Controllers;


use database;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TopupController extends Controller
{
    public function showTopupForm()
    {
        return view('profile.topup');
    }

    public function processTopup(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:10000',
            'payment_method' => 'required|in:gopay,dana,ovo,bca,mandiri,bni'
        ]);
    
        try {
            // Mulai database transaction untuk keamanan
            DB::beginTransaction();
    
            // Buat transaksi top up
            $transaction = Transaksi::create([
                'id_user' => Auth::id(),
                'type' => 'topup',
                'amount' => $validated['amount'],
                'method' => $validated['payment_method'],
                'status' => 'success', // Langsung set success
                'reference_number' => 'TOP-' . Str::random(10),
                'description' => 'Top Up Saldo'
            ]);
    
            // Update saldo pengguna
            $user = Auth::user();
            $user->saldo += $validated['amount'];
            $user->save();
    
            // Commit transaksi database
            DB::commit();
    
            // Redirect dengan pesan sukses
            return redirect()
                ->route('topup')
                ->with('success', 'Top up saldo berhasil. Saldo Anda bertambah Rp ' . number_format($validated['amount'], 0, ',', '.'));
    
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
                        DB::rollBack();
    
            return back()
                ->with('error', 'Gagal melakukan top up: ' . $e->getMessage());
        }
    }
}