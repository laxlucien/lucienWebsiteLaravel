@extends('layouts.frontendOtherPage')

@section('content')

<center>
    <h1 style="width: 15%; color:white; background-color: #27272A; padding: 10px; border-radius: 8px;">Photos -</h1>
    @guest
        <h3 style="width: 60%; color:white; background-color: #27272A; padding: 10px; border-radius: 8px;">
            Browse the various photos that various people have uploaded to the website below
        </h3>
    @else
        <h3 style="width: 60%; color:white; background-color: #27272A; padding: 10px; border-radius: 8px;">
            Hello {{Auth::user()->username}}, would you like to upload a photo?
        </h3>
    @endguest
    <br>
</center>

@endsection