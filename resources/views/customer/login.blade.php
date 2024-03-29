@extends('layouts.customer-nav')
@section('content')
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    </head>
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <hr class="text-white">
    <body style="background-color: #00001c;">
    <div class="container h-60 mt-5 d-flex justify-content-center align-items-center">
        @include('admin.message')
        <form method="post" action="{{ route('customer.loginProcess') }}"
              class="border bg-white p-3 rounded">
            @csrf
            <div class="my-4 text-center">
                <h1 class="h1">Login</h1>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{old('email')}}"
                >
                @error('email')
                    <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                       value="{{old('password')}}">
                @error('password')
                    <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3 d-flex justify-content-center align-items-center">
                <button class="btn btn-primary rounded-5 px-4">Login</button>
            </div>

            <div class="form-text d-flex justify-content-between align-items-center">
                <div class="me-5">
                    <a href="{{route('customer.forgotPassword')}}">Forgot password</a>
                </div>
                <div>
                    Don't have an account? Join us <a href="{{route('customer.register')}}">here</a>
                </div>
            </div>
        </form>
    </div>
    </body>
@endsection

