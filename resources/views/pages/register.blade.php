@extends('layouts.frontendOtherPage')

@section('content')

    <center>
        <br>
        <h1 style="width: 50%;" class="styleBorder">Register for Lucien's Place For Things</h1>
        <br>
    </center>	
    <center>
        <form class=" align-items-center justify-content-center" action="{{ url('storeUser') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <h2><label for="username" class="styleBorder" style="width: 20%;">Username:</label></h2>
                <input class="form-control" type="text" id="username" name="username" placeholder="Username" required />
            </div>

            <div class="form-group">
                <h2><label for="fname" class="styleBorder" style="width: 20%;">First name:</label></h2>
                <input class="form-control" type="text" id="fname" name="fname" placeholder="First Name" required /><!-- comment -->
            </div>

            <div class="form-group">
                <h2><label for="lname" class="styleBorder" style="width: 20%;">Last name:</label></h2>
                <input class="form-control" type="text" id="lname" name="lname" placeholder="Last Name" required /><!-- comment -->
            </div><!-- comment -->

            <div class="form-group">
                <h2><label for="email" class="styleBorder" style="width: 20%;">Email:</label></h2>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email" required />
            </div>

            <div class="form-group">
                <h2><label for="password" class="styleBorder" style="width: 20%;">Password:</label></h2>
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" required />
            </div>

            <br>

            <div class="form-group">
                <input style="font-size: 20px" type="submit" value="Submit" name="submit" class="form-control"/>
            </div>
        </form>
    </center>
    <br>
    <center>
      <h3 style="width: 50%;" class="styleBorder">Already have an account? <u><a href="login.php" style="color: white">Login</a></u> here.</h3>
      <br>
      <h3 class="styleBorder" style="width: 50%;">Not what you wanted to see? Go <a href="index.php" style="color: white" ><u>back</u></a> to home.</h3>
    </center>

@endsection