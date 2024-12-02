<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymPriceCategory extends Model
{
    protected $table = 'gym_price_categories';
    
    protected $fillable = ['nama_kategori'];

    public function prices()
    {
        return $this->hasMany(GymPrice::class, 'category_id');
    }
}


