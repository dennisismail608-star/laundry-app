@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit customer</h4>
                        <p class="card-description">Isi Form untuk Edit customer</p>
                        <form action="{{ route('customer.update', $customer->id) }}" class="forms-sample" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="customer_name" placeholder="Isi Nama Anda">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Masukan no customer">
                            </div>
                            <div class="form-group">
                                <label for="">address</label>
                                <textarea class="form-control" name="address" id="" cols="30" rows="10"></textarea>
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
