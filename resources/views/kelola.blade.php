<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="datatable/query.js"></script>
    <script type="text/javascript" src="datatable/datatable.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="datatable/datatable.min.css">
    <title>Example | {{ $header }}</title>
</head>
<body>
    
    @include('layout.nav')



    
    <div class="container mt-5 mb-5">
        <a href="/tambah" class="btn btn-success mb-5 mt-5">Tambah</a>
        @if (Session::has('success'))
            <div class="alert alert-success show mb-5">{{ Session::get('success') }}</div>
        @endif
        <table class="display mt-5 mb-5" style="width: 100%" id="example">
            <thead>
                <th>Id</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </thead>
            @foreach ($products as $item)
                <tbody>
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><img src="{{ $item->image }}" style="height: 100px" alt=""></td>
                        <td>{{ $item->title }}</td>
                        <td>Rp. {{ $item->price }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>
                            <form action="{{ route('deleteproduct', $item->id) }}" method="POST">
                                @csrf
                                <div class="button-group">
                                    <a href="{{ route('edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger">Delete</button>
                                    {{-- <a href="{{ route('deleteproduct', $item->id) }}" onclick="return confirm('yakin akan menghapus product?')"  class="btn btn-danger">Delete</a> --}}
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>


    <script src="{{ asset('/asset/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#example').DataTable();
        })
    </script>

    @include('layout.footer')

</body>
</html>