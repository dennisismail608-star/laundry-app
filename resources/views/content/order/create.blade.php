@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body col-lg-12">
                        <h1 class="card-title text-center">Tambah Transaksi Order</h1>

                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf

                            <!-- Order Code -->
                            <div class="mb-3">
                                <label>
                                    <h4 class="mt-4">Order Code : {{ $order_code ?? '' }}</h4>
                                    <input type="hidden" name="order_code" class="form-control"
                                        value="{{ $order_code }}">
                                </label>
                            </div>

                            <!-- Customer -->


                            <!-- Tanggal -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Customer</label>
                                    <select name="id_customer" class="form-control" required>
                                        <option value="">-- pilih customer --</option>
                                        @foreach ($customers as $c)
                                            <option value="{{ $c->id }}">{{ $c->customer_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Tanggal Order</label>
                                    <input type="date" name="order_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Notes</label>
                                <textarea name="services[0][notes]" cols="30" rows="10" class="form-control"></textarea>
                            </div>


                            <!-- Detail Service -->
                            <h5>Detail Service</h5>
                            <table class="table" id="serviceTable">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Qty (Kg)</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="services[0][id_service]" class="form-control service">
                                                @foreach ($services as $s)
                                                    <option value="{{ $s->id }}" data-price="{{ $s->price }}">
                                                        {{ $s->service_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" name="services[0][qty]" class="form-control qty"
                                                value="1"></td>
                                        <td><input type="number" name="services[0][price]" class="form-control price"
                                                readonly></td>
                                        <td><input type="number" name="services[0][subtotal]" class="form-control subtotal"
                                                readonly></td>
                                        <td><button type="button" class="btn btn-danger removeRow">X</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" id="addRow" class="btn btn-success">Tambah Service</button>

                            <!-- Pembayaran -->
                            <div class="mt-3">
                                <label>Bayar</label>
                                <input type="number" id="order_pay" name="order_pay" class="form-control">
                            </div>

                            <div class="mt-3">
                                <label>Total</label>
                                <input type="number" id="total" name="total" class="form-control" readonly>
                            </div>
                            <div class="mt-3">
                                <label>Kembalian</label>
                                <input type="number" id="order_change" name="order_change" class="form-control" readonly>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-light mt-3">Cancel</a>
                        </form>

                        <script>
                            function updateTable() {
                                let total = 0;
                                document.querySelectorAll('#serviceTable tbody tr').forEach(function(row) {
                                    let select = row.querySelector('.service');
                                    let price = parseInt(select.selectedOptions[0].getAttribute('data-price')) || 0;
                                    let qty = parseInt(row.querySelector('.qty').value) || 0;
                                    let subtotal = price * qty;

                                    row.querySelector('.price').value = price;
                                    row.querySelector('.subtotal').value = subtotal;

                                    total += subtotal;
                                });
                                document.getElementById('total').value = total;

                                let bayar = parseInt(document.getElementById('order_pay').value) || 0;
                                document.getElementById('order_change').value = bayar - total;
                            }

                            // tambah row
                            document.getElementById('addRow').addEventListener('click', function() {
                                let tableBody = document.querySelector('#serviceTable tbody');
                                let rowCount = tableBody.rows.length;
                                let newRow = tableBody.rows[0].cloneNode(true);

                                newRow.querySelector('.qty').value = 1;
                                newRow.querySelector('.price').value = 0;
                                newRow.querySelector('.subtotal').value = 0;

                                newRow.querySelectorAll('select, input').forEach(function(el) {
                                    el.name = el.name.replace(/\d+/, rowCount);
                                });

                                tableBody.appendChild(newRow);
                                updateTable();
                            });

                            // hapus row
                            document.querySelector('#serviceTable tbody').addEventListener('click', function(e) {
                                if (e.target.classList.contains('removeRow')) {
                                    let row = e.target.closest('tr');
                                    let tableBody = document.querySelector('#serviceTable tbody');
                                    if (tableBody.rows.length > 1) {
                                        row.remove();
                                        updateTable();
                                    } else {
                                        alert("Minimal harus ada 1 service");
                                    }
                                }
                            });

                            document.addEventListener('input', function(e) {
                                if (e.target.classList.contains('qty') || e.target.classList.contains('service') || e.target.id ===
                                    'order_pay') {
                                    updateTable();
                                }
                            });

                            updateTable();
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
