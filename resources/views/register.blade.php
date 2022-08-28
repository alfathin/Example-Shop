@extends('layout.main')

@section('container')
    

    <div class="container mt-5 mb-5" style="height: 100vmin">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5 p-3">
                    <form action="/register" method="POST">
                        @csrf
                        <h2 class="text-center">Register</h2>
                        <div class="mb-3">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Register</button>
                        </div>
                        <small>You have any account? <a href="/login" class="text-decoration-none">Login</a></small>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection