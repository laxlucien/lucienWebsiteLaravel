@extends('layouts.frontendOtherPage')

@section('content')

<br>
    <center>
    <h3 style="width: 70%; color:white; background-color: #27272A; padding: 10px; border-radius: 8px;">ERROR:<br><br>Incorrect Username or Password<br>Or<br>You are trying to log into the system too soon after account creation.</h3>
    <br>
    <h3 style="width: 70%; color:white; background-color: #27272A; padding: 10px; border-radius: 8px;">Click <u><a href="{{ url('/login') }}">here</a></u> to login again<br>or<br>Click <u><a href="{{ url('/') }}">here</a></u> to return to home.</h3>
    </center>

@endsection