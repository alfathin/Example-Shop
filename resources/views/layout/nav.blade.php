<nav class="navbar navbar-expand-lg bg-danger fixed-top text-light">
    <div class="container">
        <div class="navbar-brand">ExampleShop</div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">

                @guest
                    <li class="nav-item">
                        <a href="/" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/products" class="nav-link text-white">Product</a>
                    </li>
                @endguest

               @auth
                    @if (auth()->user()->role == 'admin')
                        <li class="nav-item">
                            <a href="/" class="nav-link text-white">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/products" class="nav-link text-white">Product</a>
                        </li>
                        <li class="nav-item">
                            <a href="/kelola" class="nav-link text-white">Kelola</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/" class="nav-link text-white">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/products" class="nav-link text-white">Product</a>
                        </li>
                        <li class="nav-item">
                            <a href="/cart" class="nav-link text-white">Cart</a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('summary', $item->id) }}" class="nav-link text-white">Summary</a> --}}
                            <a href="/summary" class="nav-link text-white">Summary</a>
                        </li>
                    @endif
               @endauth

            </ul>
        </div>
        @auth
            <a href="/logout" class="btn btn-warning">Logout</a>
            @else
            <a href="/login" class="btn btn-primary">Login</a>
        @endauth
    </div>
</nav>