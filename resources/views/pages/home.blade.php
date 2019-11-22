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
            <div class="card" style="border-radius: 16px;">
                    <div class="card-body">
                        <div class="row justify-content-center form-group" >
                            <input
                                class="center justify-content-center col-md-8"
                                type="text"
                                name="SearchInput"
                                list="SearchInput"
                                id="SearchInput"
                                style="text-align:center; border:none; border-bottom: 1px solid gray; outline: none; top: 20px;"
                                placeholder="What are you looking for?"
                                value="{{ $keyword }}"
                                onkeyup="CheckKeywords(this.value)"
                            />
                            <div id="KeywordsSuggestions" class="center justify-content-center col-md-12" style="
                                display: block;
                                position:relative;
                                z-index: 1;
                                top:50px;
                                "
                            <div class="modal-content" style="
                                background-color: #fefefe;
                                margin: 15% auto;
                                padding: 20px;
                                border: 1px solid #888;
                                width: 80%;">
                                <table class="table">
                                    <tbody id="ResultRecordsBody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>

                    </div>
                    <div class="row justify-content-center form-group" style="margin: 0 auto; width: 50%;">
                        <button
                        class="btn btn-block btn-info center justify-content-center col-md-12"
                        onclick="onPressSearch()"
                        > Search </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group m-md-5">
            <table class="table">
                    <tbody>
                        @foreach($queue as $result)
                            <tr><td>
                                <div class="row form-group">
                                    <p1>{{ $result->name }}</p1>
                                </div>
                                <div class="row form-group">
                                    <p3>{{ $result->description }}</p3>
                                </div>
                                <div class="row form-group">
                                    <a href="{{ $result->site_link }}">{{ $result->site_link }}</a>
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

        function CheckKeywords(keyword) {
            $.ajaxSetup
            ({
                headers:
                {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax
            ({
                url: "{{ route('checkeywords') }}",
                type: "get",
                dataType: 'json',
                data: {
                    keyword: keyword
                },
                success: function( data ) {
                    console.debug(data);
                    var tableBody = document.getElementById('ResultRecordsBody');
                    while (tableBody.firstChild) {
                        tableBody.removeChild(tableBody.firstChild);
                    }
                    if(data.length > 0) {
                        var limit = (data.length <= 3) ? data.length : 3;
                        for(var count = 0; count < limit; count++) {
                            var tableRow = document.createElement('tr');
                            var tdRow = document.createElement('td');
                            var anchor = document.createElement('a');
                            var routeURL = '{{ route('RedirectToHome')}}';
                            routeURL += "?keyword="+data[count];
                            anchor.href = routeURL;
                            anchor.innerHTML = data[count];

                            tdRow.appendChild(anchor);
                            tableRow.appendChild(tdRow);
                            tableBody.appendChild(tableRow);
                        }
                    }
                },
                error: function(err) {
                    console.debug(err);
                }
            });
        }

        function onPressSearch() {
            var searchKeyWord = document.getElementById('SearchInput').value;

            var routeURL = '{{ route('RedirectToHome')}}';
            routeURL += "?keyword="+searchKeyWord;
            window.location.replace(routeURL);
        }

    </script>
@endsection
