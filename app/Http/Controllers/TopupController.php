<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            // Buat transaksi top up
            $transaction = Transaksi::create([
                'user_id' => Auth::id(),
                'type' => 'topup',
                'amount' => $validated['amount'],
                'method' => $validated['payment_method'],
                'status' => 'pending',
                'reference_number' => 'TOP-' . Str::random(10),
                'description' => 'Top Up Saldo'
            ]);

            // Redirect ke halaman konfirmasi/pembayaran
            return redirect()
                ->route('topup.confirm', $transaction->id)
                ->with('success', 'Top up berhasil dibuat. Silakan selesaikan pembayaran.');

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Gagal membuat top up: ' . $e->getMessage());
        }
    }
}