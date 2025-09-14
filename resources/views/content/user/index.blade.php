@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data User</h4>
                        <p class="card-description">data user</p>
                        <div align="right">
                            <a href="{{ route('user.create') }}" class="btn btn-primary mt-2 mb-2">Create</a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    @foreach ($users as $key => $item)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>

                                                <span
                                                    class="btn btn-primary btn-rounded btn-fw">{{ $item->levels->level_name }}</span>

                                            </td>
                                            <td>
                                                <a href="" class="btn btn-warning btn-rounded btn-fw">Tambah
                                                    role</a>
                                                <a href="" class="btn btn-info btn-rounded btn-fw">Edit</a>
                                                <form action="" method="post" class="d-inline"
                                                    onclick="return confirm('Yakin ingin delete ?')">
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
