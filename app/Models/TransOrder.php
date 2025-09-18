<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransOrder extends Model
{
    protected $fillable = [
        "id_customer",
        "order_code",
        "order_date",
        "order_end_date",
        "order_status",
        "order_pay",
        "order_change",
        "total",
    ];

    public function details()
    {
        return $this->hasMany(TransOrderDetail::class, 'order_id');
    }
}
