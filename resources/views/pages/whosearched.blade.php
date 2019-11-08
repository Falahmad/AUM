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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border-radius: 16px;">
                    <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <thead>
                                        <th style="text-align:center;">Name</th>
                                        <th style="text-align:center;">Keyword</th>
                                        <th style="text-align:center;">Created at</th>
                                    </thead>
                                    @foreach($queue as $result)
                                        <tr>
                                            <td style="text-align:center;">{{ $result->name }}</td>
                                            <td style="text-align:center;">{{ $result->keyword }}</td>
                                            <td style="text-align:center;">{{ $result->createdAt }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
