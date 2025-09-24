@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <!-- Detail Service -->
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body col-lg-12">
                        <h1 class="card-title text-center">Detail Order</h1>
                        <h5>Detail Service</h5>
                        <table class="table table-hover" id="serviceTable">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>Qty (Kg)</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($order->details ?? [] as $item)
                                    <tr>
                                        <td>
                                            @if ($item->service)
                                                <span>{{ $item->service->service_name }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada detail service</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Customer & Info -->
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body col-lg-12">
                        <h4>Order Code: {{ $order->order_code }}</h4>

                        <div class="mb-3">
                            <label>Customer</label>
                            <input type="text" class="form-control" value="{{ $order->customer->customer_name ?? '-' }}"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Order</label>
                            <input type="date" class="form-control" value="{{ $order->order_date }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Order</label>
                            <input type="date" class="form-control" value="{{ $order->order_end_date }}" readonly>
                        </div>

                        {{-- <div class="mb-3">
                            <label>Catatan</label>
                            <input class="form-control" type="text" value={{ $order->notes }} readonly>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Pembayaran -->
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body col-lg-12">
                        <div class="mb-3">
                            <label>Bayar</label>
                            <input type="number" class="form-control" value="{{ $order->order_pay }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label>Total</label>
                            <input type="number" class="form-control" value="{{ $order->total }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label>Kembalian</label>
                            <input type="number" class="form-control" value="{{ $order->order_change }}" readonly>
                        </div>

                        <a href="{{ route('report.index') }}" class="btn btn-light mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
