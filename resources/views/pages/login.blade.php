@extends('layouts.frontendOtherPage')

@section('content')

<center>
    <form action="{{ url('authentificateUser') }}" method="post" name="login">
        @csrf
        
        <h1 style="width: 60%;" class="styleBorder">Login to Lucien's Place For Things- </h1><!-- comment -->
        <br><br>
        <div class="form-group">
            <h2 style="width: 20%;" class="styleBorder"><label for="username">Username:</label></h2>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username"/>
        </div>
        <div class="form-group">
            <h2 style="width: 20%;" class="styleBorder"><label for="password">Password:</label></h2>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
        </div>
        <br>
        <div class="form-group">
            <input style="font-size: 20px" type="submit" value="Login" name="submit" class="form-control"/>
        </div>
    </form>
</center>
<br>
<center>
    <h3 style="width: 20%;" class="styleBorder">Don't have an account? <br> Click <u><a href="register.php">here</a></u> to register.</h3>
    <br>
    <h3 style="width: 20%;" class="styleBorder">Not what you wanted? <br> Click <u><a href="index.php">here</a></u> to return to home.</h3>
</center>

@endsection