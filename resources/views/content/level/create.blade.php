@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Role User</h4>
                        <p class="card-description">Isi Form untuk tambah user</p>
                        <form action="{{ route('level.store') }}" class="forms-sample" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name category</label>
                                <input type="text" class="form-control" name="level_name" placeholder="Role user">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
