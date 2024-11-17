<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'pembayaran_id';
    protected $fillable = [
        'reservasi_id',
        'metode_pembayaran',
        'status_pembayaran',
        'jumlah',
        'tanggal_pembayaran',
    ];

    // Relasi dengan reservasi
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservasi_id');
    }
}

