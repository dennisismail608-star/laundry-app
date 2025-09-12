<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        "name",
        "email",
        "password",
        "id_level",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_level');
    }

    //banyak user punya banyak role
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    //cek memiliki role tertentu
    public function hasRole($level)
    {
        return $this->level()->where('level_name', $level)->exists();
    }

    public function hasAnyRole($level)
    {
        return $this->roles()->whereIn('level_name', $level)->exists();
    }
}
