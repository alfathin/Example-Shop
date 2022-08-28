@extends('layout.main')

@section('container')

    <h1 class="text-center mt-5 mb-5">Page {{ $header }}</h1>
    
    @if (Session::has('success'))
        <div class="alert alert-success show mb-5 mt-5">{{ Session::get('success') }}</div>
    @endif


    <div class="container mt-5 mb-5">
        @foreach ($product as $item)
           <div class="card mt-5 mb-5 p-5">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ $item->product->image }}" alt="" class="card-img-top">
                    </div>
                    <div class="col-md-4">
                        <h4 class="card-title text-center">{{ $item->product->title }}</h4>
                        <hr>
                        <label for="" class="form-label">Qty Product : </label>
                        <input type="number" value="{{ $item->qty }}" class="form-control" disabled>
                        <hr>
                        <div class="card-title">Product price :  </div>
                        <h6 class="card-text text-danger">Rp. {{ $item->product->price }}</h6>
                        <div class="card-title">Total price :  </div>
                        <h6 class="card-text text-danger">Rp. {{ $item->totalprice }}</h6>
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('deletecart', $item->id) }}" method="">
                        @csrf
                            <div class="button-group ms-5">
                                <a href="{{ route('checkout', $item->id) }}" class="btn btn-primary">Checkout</a>
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </div>
                         </form>
                    </div>
                </div>
           </div>
        @endforeach
    </div>

@endsection