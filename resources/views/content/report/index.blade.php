@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Report</h4>
                        <p class="card-description">Report Order</p>
                        <div align="right">
                            <form action="{{ route('report.pdf.all') }}">
                                <button type="submit" class="btn btn-info btn-icon-text btn-sm">
                                    <i class="ti-printer btn-icon-append"></i>
                                    print
                                </button>
                            </form>
                            {{-- <a href="{{ route('report.pdf.all') }}" class="btn btn-danger">Download PDF</a> --}}
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Code</th>
                                        <th>Customer Name</th>
                                        <th>date</th>
                                        <th>Total</th>
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
                                            <td class="py-1">{{ $item->total }}</td>
                                            <td class="py-1">
                                                @if ($item->order_status == 0)
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($item->order_status == 1)
                                                    <span class="badge bg-success">Pickup</span>
                                                @endif
                                            </td>
                                            <td class="py-1">
                                                <form action="{{ route('report.pdf', $item->id) }}" class="d-inline">
                                                    <button class="btn btn-danger btn-rounded btn-fw btn-sm">print</button>
                                                </form>

                                                <a href="{{ route('report.detail', $item->id) }}"
                                                    class="btn btn-info btn-rounded btn-fw btn-sm">detail</a>
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
