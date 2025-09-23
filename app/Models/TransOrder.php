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
        return $this->hasMany(TransOrderDetail::class, 'id_order', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }

    public function getStatusTextAttribute()
    {
        return $this->order_status == 1 ? 'Selesai' : 'Belum Selesai';
    }

    public function pickup()
    {
        return $this->hasOne(TransLaundryPickup::class, 'id_order');
    }
}
