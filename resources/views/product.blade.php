@extends('layout.main')

@section('container')



    
    <div class="container mt-5 mb-5">
        <div class="row">
                <div class="col-md-4">
                    <div class="card mt-5">
                        <img src="{{ $item->image }}" alt="" class="card-img-top">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mt-5">
                        <form action="{{ route('postcart', $item->id) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title text-center">{{ $item->title }}</h4>
                                <hr>
                                <div class="card-text">Price : </div>
                                <h5 class="card-title text-danger">Rp. {{ $item->price }}</h5>
                                <div class="card-text mb-3">{{ $item->body }}</div>
                                <label for="" class="form-label">Total Qty : </label>
                                <input type="number" name="total" required class="form-control">
                                <hr>
                                <div class="button-group">
                                    <button type="submit" class="btn btn-primary">Cart</button>
                                    <a href="#" class="btn btn-warning text-white">Checkout</a>
                                    <a href="/products" class="btn btn-danger">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4 mt-5">
                    <div class="card">
                        <img src="{{ asset('/asset/image/logo.png') }}" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $item->category->name }}</h5>
                            <hr>
                            <a href="/category/{{ $item->category->id }}" class="btn btn-primary">Info</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>

@endsection