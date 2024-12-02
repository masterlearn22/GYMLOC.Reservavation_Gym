<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymPrice extends Model
{
    protected $table = 'gym_prices';
    
    protected $fillable = [
        'gym_id', 
        'category_id', 
        'durasi', 
        'harga'
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id', 'gym_id');
    }

    public function category()
    {
        return $this->belongsTo(GymPriceCategory::class, 'category_id');
    }
}