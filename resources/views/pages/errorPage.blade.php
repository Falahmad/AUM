@extends('layouts.errorPagelayout')

@section('content')
<center>
<div class="" style="
width: 100%;
display: flex;
height: 100vh;
justify-content: center;
">
    @if($errorType != 'Mobile')
        <h1 style="font-family: inherit; font-weight: 500; line-height: 1.1; color: inherit;  align-self: center; font-size: 36px;">
            {{ $error }}
            </br>
            <input style="height:50px;justify-content: center; display:block; text-align:center; font-size:20px;" class="btn btn-block btn-danger font-weight-bold" type="button" value="Back" onclick="window.history.back()" />
        </h1>
    @else
    <div class="row justify-content-center col-10">
        <h1 style=" font-weight: 1000; align-self: center; font-size: 36px;">{{ $error }}</h1>
    </div>
    @endif
</div>
</center>
@endsection
