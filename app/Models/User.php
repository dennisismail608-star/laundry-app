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

    public function level()
    {
        return $this->belongsTo(User::class, 'id_level', 'id');
    }
}
