@extends('layouts.app')

@section('page-contents')
    <div class="row col-12 vh-100">
        <div class="col col-6 bg-main-color h-100">
            <div class="d-flex flex-column w-100 h-100 justify-content-center align-items-center px-5">
                <h1 class="text-white my-3"><b>Greetings Fellow 👋</b></h1>
                <img src="/images/login-image.svg" class="h-50" alt="">
                <p class="text-white text-center">Welcome to the Coffe Shop Admin Dashboard! Log in now to access all the
                    features and
                    full control over your shop.</p>
            </div>
        </div>
        <div class="col col-6 h-100 px-5">
            <div class="d-flex flex-column w-100 h-100 justify-content-center px-5">
                <div class="row align-items-center mb-5">
                    <img src="/images/icon-app.svg" style="height: 3em" alt="">
                    <h4 class="text-black">Coffe Shop</h4>
                </div>
                <h2><b class="text-black">Login</b></h2>
                <p>Please input your credential to access our dashboard</p>
                <form class="mt-5 w-100" method="POST" action="{{ route('authenticate') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            placeholder="Please enter your email here">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Please enter your password here">
                    </div>
                    <div class="form-check" data-aos="fade-up" data-aos-delay="300">
                        <input class="form-check-input" type="checkbox" role="switch" id=""
                            onclick="show_password()">
                        <label class="form-check-label" for="">Show Password</label>
                    </div>
                    <button type="submit" class="btn btn-success w-100 mt-5">Sign In</button>
                </form>
            </div>
        </div>
    </div>
@endsection
