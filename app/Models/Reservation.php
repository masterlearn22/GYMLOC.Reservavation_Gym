<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $primaryKey = 'reservasi_id';
    protected $fillable = [
        'id_user',
        'gym_id',
        'tgl_reservasi',
        'tgl_berakhir',
        'status',
        'total_harga',
    ];

    // Relasi dengan user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan gym
    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id');
    }

    // Relasi dengan payment
    public function payment()
    {
        return $this->hasOne(Payment::class, 'reservasi_id');
    }
}

