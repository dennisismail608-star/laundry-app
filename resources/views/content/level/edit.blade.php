@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('level.update', ['level' => $edit->id]) }}" method="post" class="forms-sample">
                            @csrf
                            @method('PUT')
                            <h4 class="card-title">Edit Role User</h4>
                            <p class="card-description">Edit data role user</p>
                            <div class="form-group">
                                <label>Name category</label>
                                <input type="text" class="form-control" name="level_name" placeholder="Role user"
                                    value="{{ $edit->level_name }}">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('level.index') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
