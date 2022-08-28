<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ExampeShop | {{ $header }}</title>
    <link rel="stylesheet" href="{{ asset('/asset/css/bootstrap.min.css') }}">
</head>
<body>
    
    @include('layout.nav')

    <div class="container">
        @yield('container')
    </div>

    @include('layout.footer')

    <script src="{{ asset('/asset/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>