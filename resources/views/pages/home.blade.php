@extends('layouts.MasterPortal')

@section('header')
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                AUM
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
<div class="row justify-content-center float-none ">
    <div class="col-0">
        <img src ="{{ asset('images/aumlogo.jpg') }}" style="width:400px;height:150px;" >
    </div>
</div>
</br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold" style="text-align:center; background-color:red; color:white;">Login</div>
                    <div class="card-body">
                        <form  method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group" class="center_div" style="width: 50%; margin: 0 auto; ; height: 50px">
                                <input autocomplete="false" id="userId" type="text" class="form-control{{ $errors->has('userId') ? ' is-invalid' : '' }}" name="userId" value="{{ old('userId') }}" style="
                                text-align:center;
                                outline: 0;
                                border-width: 0 0 2px;
                                border-color: light-gray;
                                background-color: clear"
                                placeholder="Email address"
                                required autofocus>
                                @if ($errors->has('userId'))
                                    <span class="invalid-feedback">
                                        <strong>Invalid email address</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group" class="center_div" style="margin: 0 auto; width: 50%; height: 50px" center>
                                    <input autocomplete="false" id="password" autocomplete="off" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" style="
                                    text-align:center;
                                    outline: 0;
                                    border-width: 0 0 2px;
                                    border-color: light-gray;
                                    background-color: clear"
                                    placeholder="Password"
                                    required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>Wronge password</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="row justify-content-center" style="margin: 0 auto; width: 50%;">
                                <button type="submit" class="btn" style="
                                width: 100%;
                                border-color: black;
                                border-width: 1;
                                background-color: clear;
                                font-weight: bold;
                                color: gray
                                ">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
