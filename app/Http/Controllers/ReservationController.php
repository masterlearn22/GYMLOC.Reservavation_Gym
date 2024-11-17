<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Payment;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // 1. Menampilkan daftar reservasi
    public function index()
    {
        $reservations = Reservation::with('user', 'gym', 'payment')->paginate(10); // Pagination 10 per halaman
        return response()->json($reservations);
    }

    // 2. Membuat reservasi baru
    public function create(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'gym_id' => 'required|exists:gyms,gym_id',
            'tgl_reservasi' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'total_harga' => 'required|numeric|min:0',
        ]);

        $reservation = Reservation::create([
            'user_id' => $validated['user_id'],
            'gym_id' => $validated['gym_id'],
            'tgl_reservasi' => $validated['tgl_reservasi'],
            'waktu_mulai' => $validated['waktu_mulai'],
            'waktu_selesai' => $validated['waktu_selesai'],
            'total_harga' => $validated['total_harga'],
            'status' => false, // Default status belum terbayar
        ]);

        return response()->json([
            'message' => 'Reservasi berhasil dibuat',
            'data' => $reservation,
        ], 201);
    }

    // 3. Memperbarui status reservasi (opsional, jika ada)
    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|boolean',
        ]);

        $reservation->status = $validated['status'];
        $reservation->save();

        return response()->json([
            'message' => 'Status reservasi berhasil diperbarui',
            'data' => $reservation,
        ]);
    }

    // 4. Menambahkan pembayaran ke reservasi
    public function addPayment(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $validated = $request->validate([
            'metode_pembayaran' => 'required|string|max:150',
            'jumlah' => 'required|numeric|min:0',
        ]);

        // Tambahkan data pembayaran
        $payment = Payment::create([
            'reservasi_id' => $reservation->reservasi_id,
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'jumlah' => $validated['jumlah'],
            'status_pembayaran' => true, // Asumsi pembayaran sukses
            'tanggal_pembayaran' => now(),
        ]);

        // Update status reservasi jika pembayaran berhasil
        $reservation->status = true;
        $reservation->save();

        return response()->json([
            'message' => 'Pembayaran berhasil ditambahkan ke reservasi',
            'data' => [
                'reservation' => $reservation,
                'payment' => $payment,
            ],
        ]);
    }
}
