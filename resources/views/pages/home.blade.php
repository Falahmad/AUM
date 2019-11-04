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
                    <div class="card-body">
                        <div class="row justify-content-center form-group" >
                            <input
                                class="center justify-content-center col-md-12"
                                type="text"
                                name="SearchInput"
                                id="SearchInput"
                                style="text-align:center;"
                                placeholder="What are you looking for?"
                                value="{{ $keyword }}"
                            />
                        </div>
                        <div class="row justify-content-center form-group" style="margin: 0 auto; width: 50%;">
                            <button
                            class="btn btn-block btn-info"
                            onclick="onPressSearch()"
                            > Search </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <table class="table">
                    <tbody>
                        @foreach($queue as $result)
                            <tr><td>
                                <div class="row form-group">
                                    <p1>{{ $result['name'] }}</p1>
                                </div>
                                <div class="row form-group">
                                    <p3>{{ $result['description'] }}</p3>
                                </div>
                                <div class="row form-group">
                                    <a href="{{ $result['site_link'] }}">{{ $result->site_link }}</a>
                                </div>
                            </td></tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">

        function onPressSearch() {
            var searchKeyWord = document.getElementById('SearchInput').value;

            var routeURL = '{{ route('RedirectToHome')}}';
            routeURL += "?keyword="+searchKeyWord;
            window.location.replace(routeURL);
        }

    </script>
@endsection
