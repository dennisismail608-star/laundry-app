<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransOrderDetail extends Model
{
    protected $fillable = [
        "order_id",
        "service_id",
        "qty",
        "subtotal",
        "notes",
    ];

    public function order()
    {
        return $this->belongsTo(TransOrder::class, 'order_id');
    }

    public function service()
    {
        return $this->belongsTo(TypeOfService::class, 'service_id');
    }
}
