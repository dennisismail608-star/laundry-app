<?php

namespace App\Http\Controllers;

use App\Models\TransOrder;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use App\Models\TypeOfService;
use App\Models\TransOrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function createOrderCode()
    {
        $code_format = "ORD";
        $today  = Carbon::now()->format('Y-n-j'); // hasil: 2025-9-18
        $prefix = $code_format . "-" . $today . "-";

        // ambil order terakhir hari ini
        $lastOrder = TransOrder::whereDate('created_at', Carbon::today())
            ->orderBy('id', 'desc')
            ->first();

        if ($lastOrder && isset($lastOrder->order_code)) {
            // ambil 3 digit terakhir dari order_code
            $lastNumber = (int) substr($lastOrder->order_code, -3);
            $newNumber = str_pad($lastNumber + 1, 3, "0", STR_PAD_LEFT);
        } else {
            $newNumber = "001";
        }

        $order_code = $prefix . $newNumber;
        return $order_code;
    }

    public function index()
    {
        $orders = TransOrder::with('customer')->get();
        $customer = Customer::all();
        $order = TransOrder::orderBy("id", "desc")->paginate(10);
        return view("content.order.index", compact("order", "customer"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order_code = $this->createOrderCode();
        $customers = Customer::all();
        $services  = TypeOfService::all();
        return view('content.order.laundry', compact('customers', 'services', 'order_code'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'id_customer' => 'required|exists:customers,id',
            'order_code'  => 'required|unique:trans_orders,order_code',
            'order_date'  => 'required|date',
            'services'    => 'required|array|min:1',
        ]);

        // Hitung total
        $total = 0;
        foreach ($request->services as $service) {
            $subtotal = ($service['price'] ?? 0) * ($service['qty'] ?? 0);
            $total += $subtotal;
        }

        $order_change = $request->order_pay ? $request->order_pay - $total : 0;

        try {
            // Simpan order
            $order = TransOrder::create([
                'id_customer'  => $request->id_customer,
                'order_code'   => $request->order_code,
                'order_date'   => $request->order_date,
                'order_status' => 0,
                'order_pay'    => $request->order_pay,
                'order_change' => $order_change,
                'total'        => $total,
            ]);

            // Simpan order details
            foreach ($request->services as $service) {
                TransOrderDetail::create([
                    'id_order'   => $order->id,
                    'id_service' => $service['id_service'],
                    'qty'        => $service['qty'],
                    'subtotal'   => $service['subtotal'],
                    'notes'      => $service['notes'] ?? null,
                ]);
            }

            // RETURN JSON agar fetch JS bisa baca
            return response()->json([
                'message' => 'Order berhasil dibuat',
                'order'   => $order,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan server',
                'error'   => $e->getMessage()
            ], 500);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = TransOrder::findOrFail($id);

        // kalau mau sekalian hapus detailnya juga:
        $order->details()->delete();

        // baru hapus order
        $order->delete();

        return redirect()->route('order.index')->with('success', '');
    }

    public function updateStatus(Request $request, $id)
    {
        $order = TransOrder::findOrFail($id);
        $status = $request->status;

        if ($status == 1 && is_null($order->order_end_date)) {
            // set end_date otomatis kalau status selesai
            $order->order_end_date = now();
        }

        $order->order_status = $status;
        $order->save();

        return back()->with('success', 'Status order berhasil diperbarui');
    }
}
