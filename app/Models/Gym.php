<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    protected $primaryKey = 'gym_id';
    protected $fillable = [
        'nama_gym',
        'alamat',
        'koordinat',
        'jarak',
        'deskripsi',
        'fasilitas',
        'foto',
        'harga_per_sesi',
        'jam_operasional',
    ];

    // Relasi dengan reservasi
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'gym_id');
    }

    public function prices()
{
    return $this->hasMany(GymPrice::class);
}

}
