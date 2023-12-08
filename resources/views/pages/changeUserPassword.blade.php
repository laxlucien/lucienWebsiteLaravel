@extends('layouts.frontendOtherPage')

@section('content')

<center>
    <h2 style="width: 20%; color: white; background-color: #27272A; padding: 10px; border-radius: 8px;">Change password</h2>
    <br>
    <h3 style="width: 60%; color: white; background-color: #27272A; padding: 10px; border-radius: 8px;">
    Careful: Remember your password is vital information! Do not share your password with anyone else and make sure to write it down in a safe location!
    </h3>
    <br>

    @if (session('status'))
        <h3 style="width: 60%; color: white; background-color: #27272A; padding: 10px; border-radius: 8px;">
        {{ session('status') }}
        </h3>
        <br>
    @endif

    <form action="{{ url('saveUserPassword/'.$user->id) }}" method="POST" style="background-color: #27272A; padding: 10px; border-radius: 8px; width:60%;">
        @csrf 
        @method('GET')
        
        <div style="width: 90%">
            <div><label style="color:white" for="password1">Password:</label></div>
            <div><input style="width: 70%" type="password" name="password1" placeholder="New Password" require></div>
        </div>
        <br>
        <div style="width: 90%">
            <div><label style="color:white" for="password2">Re-enter Password:</label></div>
            <div><input style="width: 70%" type="password" name="password2" placeholder="Re-enter New Password" require></div>
        </div>
        <br>
        <div>
            <button style="width: 50%" type="submit">Update Password</button>
        </div>
    </form>
    <br>
</center>

@endsection