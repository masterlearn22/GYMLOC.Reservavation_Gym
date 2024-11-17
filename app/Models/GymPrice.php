<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymPrice extends Model
{
    use HasFactory;

    protected $fillable = ['gym_id', 'category_id', 'durasi', 'harga'];
}
