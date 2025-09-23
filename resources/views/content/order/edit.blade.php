@extends('index')
@section('content')
    <div class="content-wrapper">
        <form action="{{ route('order.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body col-lg-12">
                            <h1 class="card-title text-center">Detail order</h1>



                            <!-- Detail Service -->
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
                                    @foreach ($order->details as $item)
                                        <tr>
                                            <td>{{ $item->id_service }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body col-lg-12">
                            <!-- Order Code -->
                            <div class="mb-3">
                                <h4 class="mt-4">Order Code : {{ $order->order_code ?? '' }}</h4>
                                <input type="hidden" name="order_code" value="{{ $order->order_code }}">
                            </div>

                            <!-- Customer & Tanggal -->
                            <div class="row col-12">
                                <div class="col-sm-12 mb-3">
                                    <label>Customer</label>
                                    <input type="text" class="form-control" value="{{ $order->customer->customer_name }}"
                                        readonly>
                                    <input type="hidden" name="id_customer" class="form-control"
                                        value="{{ $order->customer->id }}" readonly>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label>Tanggal Order</label>
                                    <input type="date" name="order_date" class="form-control"
                                        value="{{ $order->order_date }}" readonly>
                                </div>
                            </div>

                            <!-- Catatan -->
                            <div class="mb-3">
                                <label>Catatan</label>
                                <textarea name="notes" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body col-lg-12">
                            <!-- Pembayaran -->
                            <div class="mt-3">
                                <label>Bayar</label>
                                <input type="number" id="order_pay" name="order_pay" class="form-control">
                            </div>

                            <div class="mt-3">
                                <label>Total</label>
                                <input type="number" id="total" name="total" class="form-control"
                                    value="{{ $order->total }}" readonly>
                            </div>

                            <div class="mt-3">
                                <label>Kembalian</label>
                                <input type="number" id="order_change" name="order_change" class="form-control" readonly>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-light mt-3">Cancel</a>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const orderPayInput = document.getElementById("order_pay");
            const totalInput = document.getElementById("total");
            const orderChangeInput = document.getElementById("order_change");

            function hitungKembalian() {
                let bayar = parseFloat(orderPayInput.value) || 0;
                let total = parseFloat(totalInput.value) || 0;
                let kembalian = bayar - total;

                orderChangeInput.value = kembalian >= 0 ? kembalian : 0;
            }

            orderPayInput.addEventListener("input", hitungKembalian);
        });
    </script>
@endsection
