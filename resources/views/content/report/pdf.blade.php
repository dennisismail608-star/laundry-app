<!DOCTYPE html>
<html>

<head>
    <title>Order {{ $order->order_code }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Detail Order {{ $order->order_code }}</h2>

    <p><strong>Customer:</strong> {{ $order->customer->customer_name ?? '-' }}</p>
    <p><strong>Phone:</strong> {{ $order->customer->phone ?? '-' }}</p>
    <p><strong>Address:</strong> {{ $order->customer->address ?? '-' }}</p>
    <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
    <p><strong>End Date:</strong> {{ $order->order_end_date }}</p>
    <p><strong>Status:</strong> {{ $order->status_text }}</p>

    <h4>Detail Service</h4>
    <table>
        <thead>
            <tr>
                <th>Service</th>
                <th>Qty (Kg)</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->details as $item)
                <tr>
                    <td>{{ $item->id_service }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Total:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</p>
    <p><strong>Bayar:</strong> Rp {{ number_format($order->order_pay, 0, ',', '.') }}</p>
    <p><strong>Kembalian:</strong> Rp {{ number_format($order->order_change, 0, ',', '.') }}</p>
</body>

</html>
