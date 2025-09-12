@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Level user</h4>
                        <p class="card-description">level user</p>
                        <div align="right">
                            <a href="{{ route('level.create') }}" class="btn btn-primary mt-2 mb-2">Create</a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    @foreach ($level as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->level_name }}</td>
                                            <td>
                                                <a href="{{ route('level.edit', ['level' => $item->id]) }}"
                                                    class="btn btn-info btn-rounded btn-fw">Edit</a>

                                                <form action="{{ route('level.destroy', ['level' => $item->id]) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin delete ?')">
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
