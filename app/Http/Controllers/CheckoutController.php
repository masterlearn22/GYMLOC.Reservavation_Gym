<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\GymPrice;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Debugging: Periksa semua data yang diterima
       // dd($request->all());
    
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
            'metadata' => [
        'user_id' => Auth::id(), // Menambahkan user_id ke metadata
        'gym_id' => $request->gym_id, // Menambahkan gym_id ke metadata
    ],
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
        $data = $request->all();
        
        // Log data yang diterima
        Log::info('Notification received:', $data);
    
        // Ambil kunci server dari konfigurasi
        $serverKey = config('midtrans.server_key');
    
        // Verifikasi tanda tangan sesuai dokumentasi Midtrans
        $signatureKey = $data['signature_key'];
        $orderId = $data['order_id'];
        $statusCode = $data['status_code'];
        $grossAmount = $data['gross_amount'];
    
        // Gabungkan data untuk perhitungan tanda tangan
        $signatureInput = $orderId . $statusCode . $grossAmount . $serverKey;
        $expectedSignature = hash('sha512', $signatureInput);
    
        // Log untuk debugging
        Log::info('Signature verification:', [
            'order_id' => $orderId,
            'status_code' => $statusCode,
            'gross_amount' => $grossAmount,
            'server_key' => $serverKey,
            'signature_input' => $signatureInput,
            'expected_signature' => $expectedSignature,
            'received_signature' => $signatureKey,
        ]);
    
        // Verifikasi tanda tangan
        if ($signatureKey !== $expectedSignature) {
            Log::error('Invalid signature:', [
                'received' => $signatureKey, 
                'expected' => $expectedSignature
            ]);
            return response()->json(['status' => 'invalid signature'], 403);
        }
    
        // Proses status pembayaran
        if (in_array($data['transaction_status'], ['capture', 'settlement'])) {
            // Lanjutkan dengan proses pembayaran
            try {
                // Cek apakah user ID ada di metadata
                $userId = $data['metadata']['user_id'] ?? null; // Mengambil user_id dari metadata
                if (!$userId) {
                    Log::error('User  ID not provided in notification metadata');
                    return response()->json(['status' => 'error', 'message' => 'User  ID not provided'], 400);
                }
    
                // Cek apakah gym ID ada di metadata
                $gymId = $data['metadata']['gym_id'] ?? null; // Mengambil gym_id dari metadata
                if (!$gymId) {
                    Log::error('Gym ID not provided in notification metadata');
                    return response()->json(['status' => 'error', 'message' => 'Gym ID not provided'], 400);
                }
    
                // Simpan reservasi atau lakukan proses selanjutnya
                $reservation = new Reservation();
                $reservation->id_user = $userId; // Menggunakan user ID dari metadata
                $reservation->gym_id = $gymId; // Menggunakan gym ID dari metadata
                $reservation->total_harga = $data['gross_amount'];
                $reservation->tgl_reservasi = now();
                $reservation->tgl_berakhir = now()->addDays(30);
                $reservation->status = true;
                $reservation->save();
    
                Log::info('Reservation processed successfully', ['order_id' => $data['order_id']]);
            } catch (\Exception $e) {
                Log::error('Error processing reservation', ['error' => $e->getMessage()]);
                return response()->json(['status' => 'error', 'message' => 'Failed to process reservation'], 500);
            }
        }
    
        // Kembalikan respons sukses
        return response()->json(['status' => 'success']);
    }
}
