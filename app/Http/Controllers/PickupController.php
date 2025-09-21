<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransOrder;
use App\Models\TransLaundryPickup;

class PickupController extends Controller
{
    public function create($orderId)
    {
        $order = TransOrder::with('customer')->findOrFail($orderId);

        return view('content.order.pickup', compact('order'));
    }

    public function store(Request $request, $orderId)
    {
        $order = TransOrder::findOrFail($orderId);

        TransLaundryPickup::create([
            'id_order'    => $orderId,
            'id_customer' => $request->id_customer,
            'pickup_date' => $request->pickup_date,
            'notes'       => $request->notes,
        ]);

        $order->order_status = 2;
        $order->save();

        return redirect()->route('order.index')->with('success', 'Pickup berhasil dijadwalkan');
    }
}
