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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Customer Name</th>
                                        <th>Order Code</th>
                                        <th>date</th>
                                        <th>end date</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    {{-- @foreach ($services as $key => $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->service_name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <a href="{{ route('service.edit', $item->id) }}"
                                                    class="btn btn-info btn-rounded btn-fw">Edit</a>
                                                <form action="{{ route('service.destroy', $item->id) }}" method="post"
                                                    class="d-inline" onclick="return confirm('Yakin ingin delete ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-rounded btn-fw"
                                                        type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
