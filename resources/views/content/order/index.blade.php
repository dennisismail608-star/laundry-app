@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order</h4>
                        <p class="card-description">Order</p>
                        <div align="right">
                            <a href="{{ route('order.create') }}" class="btn btn-primary mt-2 mb-2">Create</a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Code</th>
                                        <th>Customer Name</th>
                                        <th>date</th>
                                        <th>end date</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($order as $key => $item)
                                        <tr>
                                            <td class="py-1">{{ $key += 1 }}</td>
                                            <td class="py-1">{{ $item->order_code }}</td>

                                            <td class="py-1">
                                                @if ($item->customer)
                                                    <small>
                                                        Nama : {{ $item->customer->customer_name }}
                                                        <br>
                                                        Tlp : {{ $item->customer->phone }}
                                                        <br>
                                                        Address :{{ $item->customer->address }}
                                                    </small>
                                                @endif
                                            </td>
                                            <td class="py-1">{{ $item->order_date }}</td>
                                            <td class="py-1">{{ $item->order_end_date }}</td>
                                            <td class="py-1">
                                                @if ($item->order_status == 0)
                                                    <span class="badge bg-secondary">Pending</span>
                                                @elseif($item->order_status == 1)
                                                    <span class="badge bg-info">Pickup Dijadwalkan</span>
                                                @elseif($item->order_status == 2)
                                                    <span class="badge bg-warning">Pickup Selesai</span>
                                                @elseif($item->order_status == 3)
                                                    <span class="badge bg-primary">Proses Laundry</span>
                                                @else
                                                    <span class="badge bg-success">Selesai</span>
                                                @endif
                                            </td>
                                            <td class="py-1">
                                                <a href="{{ route('pickup.create', $item->id) }}"
                                                    class="btn btn-sm btn-info">Pickup</a>
                                                @if ($item->order_status == 0)
                                                    <form action="{{ route('order.updateStatus', $item->id) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="btn btn-info btn-rounded btn-fw btn-sm">
                                                            Tandai Selesai
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="btn btn-outline-success btn-fw btn-sm">✔ Selesai</span>
                                                @endif

                                                <form action="{{ route('order.destroy', $item->id) }}" method="post"
                                                    class="d-inline" onclick="return confirm('Yakin ingin delete ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-rounded btn-fw btn-sm"
                                                        type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
