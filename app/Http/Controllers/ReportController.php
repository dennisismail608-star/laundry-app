<?php

namespace App\Http\Controllers;

use App\Models\TransOrder;
use App\Models\TransOrderDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $order = TransOrder::all();
        return view("content.report.index", compact("order"));
    }

    public function details($id)
    {
        $order = TransOrder::with(['customer', 'details'])
            ->findOrFail($id);
        return view("content.report.detail", compact("order"));
    }

    public function exportPDF($id)
    {
        $order = TransOrder::with(['customer', 'details'])->findOrFail($id);

        $pdf = Pdf::loadView('content.report.pdf', compact('order'));
        $filename = 'Order-' . $order->order_code . '.pdf';

        return $pdf->download($filename);
    }

    public function exportAllPDF()
    {
        $orders = TransOrder::with('customer')->get();

        $pdf = Pdf::loadView('content.report.pdf_all', compact('orders'))
            ->setPaper('A4', 'landscape'); // landscape supaya tabel muat
        return $pdf->download('All_Orders_Report.pdf');
    }
}
