@extends('layout.main')

@section('container')


    <h1 class="mt-5">{{ $header }} Page</h1>

    <div class="container mt-5 mb-5">
        <form action="{{ route('postcheckout', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card p-3">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ $item->product->image }}" alt="" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <h4 class="card-title text-center">{{ $item->product->title }}</h4>
                        <hr>
                        <label for="" class="form-label">Qty Product : </label>
                        <input type="number" value="{{ $item->qty }}" class="form-control" disabled>
                        <hr>
                        <div class="card-title">Product price :  </div>
                        <h6 class="card-text text-danger">Rp. {{ $item->product->price }}</h6>
                        <div class="card-title">Total price :  </div>
                        <h6 class="card-text text-danger">Rp. {{ $item->totalprice }}</h6>
                        <hr>
                        <div class="card-title">Upload bukti Pembayaran :  </div>
                        <input type="file" name="bukti" accept="image/*" class="form-control" required>
                        <button class="btn btn-success mt-3" type="submit">Upload</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection