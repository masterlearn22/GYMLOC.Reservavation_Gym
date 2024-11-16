<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     */

     protected $table = 'users'; // Nama tabel
     protected $primaryKey = 'id_user';
     protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'profile_photo',
        'id_role',
    ];
        


    public function Role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}