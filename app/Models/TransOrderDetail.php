<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransOrderDetail extends Model
{
    protected $fillable = [
        "id_order",
        "id_service",
        "qty",
        "subtotal",
        "notes",
    ];

    public function order()
    {
        return $this->belongsTo(TransOrder::class, 'id_order');
    }

    public function service()
    {
        return $this->belongsTo(TypeOfService::class, 'id_service');
    }

    public function pickup()
    {
        return $this->belongsTo(TransLaundryPickup::class, 'id_order');
    }
}
