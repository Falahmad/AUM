<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AUM</title>
    <link rel="icon" href="{!! asset('images/Icon.png') !!}"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/RegistrationConfirmationStyle.css') }}" rel="stylesheet">
</head>

@if($errorType != 'Mobile')
<body style="
width: 100%;
height: 100%;
background-color: #e5c54a;
color: #fff;
text-align: center;
text-shadow: 0 2px 4px rgba(0, 0, 0, .5);
padding: 0px;
min-height: 100%;
-webkit-box-shadow: inset 0 0 100px rgba(0, 0, 0, .8);
box-shadow: inset 0 0 100px rgba(0, 0, 0, .8);
display: table;
font-family: "Open Sans", Arial, sans-serif;">
    <div id="app">
        @yield('content')
    </div>
</body>
@else
<body style="
width: 100%;
height: 100%;
color: #fff;
text-align: center;
text-shadow: 0 2px 4px rgba(0, 0, 0, .5);
padding: 0px;
min-height: 100%;
-webkit-box-shadow: inset 0 0 100px rgba(0, 0, 0, .8);
box-shadow: inset 0 0 100px rgba(0, 0, 0, .8);
display: table;
font-family: "Open Sans", Arial, sans-serif;">
    <div id="app">
        @yield('content')
    </div>
</body>
@endif

</html>
