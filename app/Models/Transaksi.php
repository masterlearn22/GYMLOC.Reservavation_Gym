<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    protected $table = 'transaksi';
    protected $fillable = [
        'id_user', 
        'type', 
        'amount', 
        'method', 
        'status', 
        'description', 
        'reference_number',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array',
        'amount' => 'float'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mutator untuk format mata uang
    public function getFormattedAmountAttribute()
    {
        return 'Rp ' . number_format($this->amount, 0, ',', '.');
    }
}