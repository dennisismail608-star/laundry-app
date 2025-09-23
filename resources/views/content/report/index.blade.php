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
                            <a href="{{ route('report.pdf.all') }}" class="btn btn-danger">Download PDF</a>
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
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($item->order_status == 1)
                                                    <span class="badge bg-success">Pickup</span>
                                                @endif
                                            </td>
                                            <td class="py-1">
                                                <a href="{{ route('report.pdf', $item->id) }}"
                                                    class="btn btn-danger btn-sm">Download PDF</a>

                                                <a href="{{ route('report.detail', $item->id) }}"
                                                    class="btn btn-info btn-rounded btn-fw btn-sm">detail</a>
                                                {{-- <form action="{{ route('report.detail', $item->id) }}" method="GET"
                                                    class="d-inline">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-info btn-rounded btn-fw btn-sm">detail
                                                    </button>
                                                </form> --}}
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
