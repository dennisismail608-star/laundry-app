<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransOrder;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $reports = DB::table('trans_orders')
            ->select(
                DB::raw('COUNT(DISTINCT id_customer) as total_customers'),
                DB::raw('COUNT(id) as total_orders'),
                DB::raw('SUM(total) as total_revenue'),
                DB::raw('SUM(CASE WHEN order_status = 1 THEN 1 ELSE 0 END) as completed_orders'),
                DB::raw('SUM(CASE WHEN order_status = 0 THEN 1 ELSE 0 END) as pending_orders')
            )->get();

        $totalCustomers = Customer::count();
        $totalOrders = TransOrder::count();
        $pendingOrders = TransOrder::where('order_status', 0)->count();
        $completedOrders = TransOrder::where('order_status', 1)->count();
        $totalRevenue = TransOrder::where('order_status', 1)->sum('total');

        return view('content.dashboard', compact(
            'totalCustomers',
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'totalRevenue',
            'reports'
        ));
    }

    public function dashboard()
    {
        $totalCustomers = Customer::count();
        $totalOrders = TransOrder::count();
        $pendingOrders = TransOrder::where('status', 0)->count();
        $completedOrders = TransOrder::where('status', 1)->count();
        $totalRevenue = TransOrder::where('status', 1)->sum('total_price');

        return view('dashboard', compact(
            'totalCustomers',
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'totalRevenue'
        ));
    }
}
