<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\GymPrice;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Debugging: Periksa semua data yang diterima
        //dd($request->all());
    
        // Ambil category_id dari request
        $categoryId = $request->input('category_id');
    
        // Ambil harga berdasarkan category_id
        $price = GymPrice::where('category_id', $categoryId)->first();
    
        // Pastikan harga ada dan merupakan angka
        if (!$price || !is_numeric($price->harga)) {
            return response()->json(['error' => 'Invalid amount'], 400);
        }
    
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
    
        $transactionDetails = [
            'order_id' => uniqid(),
            'gross_amount' => (float) $price->harga, // Pastikan ini adalah float
        ];
    
        $customerDetails = [
            'first_name' => $request->username, // Ganti dengan username yang benar
            'email' => $request->email, // Ganti dengan email yang benar
        ];
    
        $transaction = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
        ];
    
        try {
            $snapToken = Snap::getSnapToken($transaction);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    
        return view('checkout.payment', ['snapToken' => $snapToken]);
    }

    public function notification(Request $request)
    {
        // Ambil data dari notifikasi
        $data = $request->all();
    
        // Debugging: Log data yang diterima
        \Log::info('Notification received:', $data);
    
        // Verifikasi signature key (jika diperlukan)
        $signatureKey = $data['signature_key'];
        $expectedSignature = hash('sha512', $data['transaction_id'] . $data['order_id'] . config('midtrans.server_key'));
    
        if ($signatureKey !== $expectedSignature) {
            \Log::error('Invalid signature:', ['received' => $signatureKey, 'expected' => $expectedSignature]);
            return response()->json(['status' => 'invalid signature'], 403);
        }
    
        // Proses status pembayaran
        if ($data['transaction_status'] === 'capture' || $data['transaction_status'] === 'settlement') {
            // Ambil informasi yang diperlukan
            $orderId = $data['order_id'];
            $grossAmount = $data['gross_amount'];
            $userId = $data['merchant_id']; // Ganti dengan ID pengguna yang sesuai
            $gymId = $data['metadata']['gym_id'] ?? null; // Ambil gym_id dari metadata jika ada
    
            // Debugging: Periksa data yang akan disimpan
            \Log::info('Saving reservation:', [
                'user_id' => $userId,
                'gym_id' => $gymId,
                'tgl_reservasi' => now(),
                'tgl_berakhir' => now()->addDays(30),
                'status' => true,
                'total_harga' => $grossAmount,
            ]);
    
            // Insert ke tabel reservations
            try {
                $reservation = new Reservation();
                $reservation->id_user = $userId; // Ganti dengan ID pengguna yang sesuai
                $reservation->gym_id = $gymId; // Ganti dengan ID gym yang sesuai
                $reservation->tgl_reservasi = now(); // Tanggal reservasi saat ini
                $reservation->tgl_berakhir = now()->addDays(30); // Misalnya, reservasi berakhir dalam 30 hari
                $reservation->status = true; // Status berhasil
                $reservation->total_harga = $grossAmount; // Total harga dari transaksi
                $reservation->save();
    
                // Debugging: Periksa apakah penyimpanan berhasil
                \Log::info('Reservation saved successfully:', $reservation->toArray());
            } catch (\Exception $e) {
                \Log::error('Error saving reservation:', ['error' => $e->getMessage()]);
                return response()->json(['status' => 'error', 'message' => 'Failed to save reservation'], 500);
            }
        }
    
        // Kembalikan respons 200 OK
        return response()->json(['status' => 'success']);
    }
}
