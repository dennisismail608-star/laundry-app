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
                                <input type="text" name="id_order" class="form-control" value="{{ $order->order_code }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label>Customer</label>
                                <input type="text" class="form-control" value="{{ $order->customer->customer_name }}"
                                    readonly>
                                <input type="hidden" name="id_customer" class="form-control"
                                    value="{{ $order->customer->id }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Tanggal Pickup</label>
                                <input type="datetime-local" name="pickup_date" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Catatan</label>
                                <textarea name="notes" class="form-control"></textarea>
                            </div>
                            <input type="hidden" name="order_status" value="2">

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
