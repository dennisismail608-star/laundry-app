<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        "customer_name",
        "phone",
        "address",
    ];

    public function pickups()
    {
        return $this->hasMany(TransLaundryPickup::class, 'id_customer');
    }
}
