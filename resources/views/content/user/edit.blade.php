@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit User</h4>
                        <p class="card-description">Isi Form untuk Edit user</p>
                        <form action="{{ route('user.update', $users->id) }}" class="forms-sample" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Isi Nama Anda">
                            </div>
                            <div class="form-group">
                                <label for="">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukan Email Anda">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Isi Password">
                            </div>
                            <div class="form-group">
                                <label for="">Pilih role</label>
                                <select name="id_level" class="form-control">
                                    @foreach ($levels as $i)
                                        <option value="{{ $i->id }}">{{ $i->level_name }}</option>
                                    @endforeach
                                </select>
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
