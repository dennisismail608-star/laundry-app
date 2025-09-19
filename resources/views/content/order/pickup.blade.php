@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Jadwal Pickup</h3>

                        <form action="{{ route('pickup.store', $order->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Order Code</label>
                                <input type="text" name="id_order" class="form-control" value="{{ $order->order_code }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Customer</label>
                                <input type="text" name="id_customer" class="form-control" value="{{ $order->customer->customer_name }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label>Tanggal Pickup</label>
                                <input type="datetime-local" name="pickup_date" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Catatan</label>
                                <textarea name="notes" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Status Order</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="order_status" value="0"
                                        {{ $order->order_status == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label">Pending</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="order_status" value="1"
                                        {{ $order->order_status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label">Pickup Dijadwalkan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="order_status" value="2"
                                        {{ $order->order_status == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label">Pickup Selesai</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="order_status" value="3"
                                        {{ $order->order_status == 3 ? 'checked' : '' }}>
                                    <label class="form-check-label">Proses Laundry</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="order_status" value="4"
                                        {{ $order->order_status == 4 ? 'checked' : '' }}>
                                    <label class="form-check-label">Selesai</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
