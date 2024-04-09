@extends('layouts.frontendOtherPage')

@section('content')

<center>
    <br>
    <h3 style="width: 20%;" class="styleBorder">Change the info for user: {{ Auth::user()->username}} </h3>
    <br>
    <h3 style="width: 60%;" class="styleBorder">Click <u><a href="{{ url('updateUserPassword/'.$user->id) }}">here</a></u> to change the password for the user: {{ Auth::user()->username}} </h3>
    <br>
    <form action="{{ url('updateUserProfile/'.$user->id) }}" method="POST" enctype="multipart/form-data" style="background-color: #27272A; padding: 10px; border-radius: 8px; width:60%;">
        @csrf 
        @method('GET')
        
        <div style="width: 90%">
            <div><label style="color:white" for="username">Username:</label></div>
            <div><input style="width: 70%" type="text" name="username" value="{{ $user->username }}"></div>
        </div>
        <br>
        <div style="width: 90%">
            <div><label style="color: white" for="fname">First Name:</label></div>
            <div><input style="width: 70%" type="text" name="fname" value="{{ $user->fname }}"></div>
        </div>
        <br>
        <div>
            <div><label style="color: white" for="lname">Last Name:</label></div>
            <div><input style="width: 63%" type="text" name="lname" value="{{ $user->lname }}"></div>
        </div>
        <br>
        <div>
            <div><label style="color:white" for="email">Email:</label></div>
            <div><input style="width: 63%" type="text" name="email" value="{{ $user->email }}"></div>
        </div>
        <br>
        <div>
            <div><label style="color:white" for="bio">Bio:</label></div>
            <div><input style="width: 63%" type="text" name="bio" value="{{ $user->bio }}"></div>
        </div>
        <br>
        <div style="width: 73%; text-align: center; align-content: center;">
            <div style="padding-bottom: 5px"><label style="color:white" for="pfp">Profile Picture:</label></div>
            <div style="display: flex; background-color: white; border-radius: 15px; padding: 10px; text-align: center; align-items: center;"><input style="width:50%" type="file" name="pfp" value="{{ $user->pfp }}"></div>
        </div>
        <br>
        <div>
            <button style="width: 50%" type="submit">Update User</button>
        </div>

    </form>
    <br>
</center>

@endsection