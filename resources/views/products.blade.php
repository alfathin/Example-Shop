@extends('layout.main')

@section('container')

    <h1 class="mt-5">All {{ $header }}</h1>

    <div class="row justify-content-between mb-5 mt-5">
        @foreach ($categories as $item)
            <div class="col-md-2 mb-3">
                <div class="card">
                    <img src="{{ $item->image }}" alt="">
                    <div class="card-body">
                        <a href="" class="badge bg-warning text-dark text-decoration-none mb-2">{{ $item->category->name }}</a>
                        <div class="card-title">{{ $item->title }}</div>
                        <div class="card-title">Rp. {{ $item->price }}</div>
                        <a href="/product/{{ $item->id }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection