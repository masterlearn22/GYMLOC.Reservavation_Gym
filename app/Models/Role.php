<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id_role';
    public $incrementing = false;
    public $timestamps = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_role', 'role'
    ];
    
    public function users()
    {
        return $this->hasMany(User::class, 'id_role');
    }

    public function settings()
    {
        return $this->hasMany(SETTING_MENU_USER::class, 'id_role');
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'SETTING_MENU_USER', 'id_role', 'MENU_ID');
    }
    
}

