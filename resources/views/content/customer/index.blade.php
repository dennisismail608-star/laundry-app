@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Customer</h4>
                        <p class="card-description">data customer</p>
                        <div align="right">
                            <a href="{{ route('customer.create') }}" class="btn btn-primary mt-2 mb-2">Create</a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    @foreach ($customers as $key => $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->customer_name }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                                <a href="{{ route('customer.edit', $item->id) }}"
                                                    class="btn btn-info btn-rounded btn-fw">Edit</a>
                                                <form action="{{ route('customer.destroy', $item->id) }}" method="post"
                                                    class="d-inline" onclick="return confirm('Yakin ingin delete ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-rounded btn-fw"
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
