<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransLaundryPickup extends Model
{
    protected $fillable = [
        "id_order",
        "id_customer",
        "pickup_date",
        "notes",
    ];

    public function order()
    {
        return $this->belongsTo(TransOrder::class, 'id_order');
    }

    // Relasi ke customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}
