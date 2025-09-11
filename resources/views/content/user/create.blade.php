@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah User</h4>
                        <p class="card-description">Isi Form untuk tambah user</p>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword4"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Level</label>
                                <select class="form-control" id="exampleSelectGender">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2" href="{{ route('user.index') }}">Submit
                                <a></a>
                            </button>
                            <button class="btn btn-light">Cancel
                                <a href="{{ route('user.index') }}"></a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
