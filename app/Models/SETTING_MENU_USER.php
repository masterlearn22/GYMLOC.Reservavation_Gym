<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SETTING_MENU_USER extends Model
{
    use HasFactory;

    protected $table = 'SETTING_MENU_USER';
    protected $primaryKey = 'NO_SETTING';


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->NO_SETTING)) {
                $model->NO_SETTING = (string) Str::uuid(); // Atur NO_SETTING sebagai UUID
            }
        });
    }
    
    public $timestamps = false;
    protected $fillable = [
        'NO_SETTING',
        'id_role',
        'MENU_ID',
        'CREATE_BY',
        'CREATE_DATE',
        'DELETE_MARK',
        'UPDATE_BY',
        'UPDATE_DATE',
    ];
    
    public function Role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'MENU_ID');
    }
}
