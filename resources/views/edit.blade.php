@extends('layout.main')

@section('container')
    

    <div class="container mt-5 mb-5">
        <form action="{{ route('postedit', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5 justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-5 p-3">
                        <h3 class="card-title text-center">Edit Product</h3>
                        <hr>
                        <div class="mb-3">
                            <label for="" class="form-label">Title Product</label>
                            <input type="text" required name="title" value="{{ $product->title }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Image Product</label>
                            <input type="file" required accept="image/*" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Price Product</label>
                            <input type="text" required name="price" value="{{ $product->price }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description Product</label>
                            <input type="text" name="body" required class="form-control" value="{{ $product->body }}">
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Category Product</label>
                            <select name="category_id" required id="" class="form-select">
                                @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Edit Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection