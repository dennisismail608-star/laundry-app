@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Service</h4>
                        <p class="card-description">Isi Form untuk tambah Service</p>
                        <form action="{{route('service.store')}}" class="forms-sample" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name Service</label>
                                <input type="text" class="form-control" name="service_name" placeholder="Isi Service">
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Masukan Harga">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
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
