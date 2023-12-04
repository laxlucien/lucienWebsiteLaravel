@extends('layouts.frontendOtherPage')

@section('content')
		<center>
			<br>
			<h1 style="color: white">Register for Lucien's Place For Things</h1>
			<br>
		</center>	
		<?php
        if(isset($_REQUEST['username'])){
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($con, $username);
            $fname = stripslashes($_REQUEST['fname']);
            $fname = mysqli_real_escape_string($con, $fname);
            $lname = stripslashes($_REQUEST['lname']);
            $lname = mysqli_real_escape_string($con, $lname);
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($con, $email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_escape_string($con, $password);

        $check = "SELECT * FROM `users` WHERE username='$username'";
        $check_select = mysqli_query($con, $check);
        $random_name = mysqli_num_rows($check_select);
        if($random_name > 0){
          header("Location: username_wrong.php");
        }else{

        $query    = "INSERT into `users` (username, fname, lname, email, password)
                     VALUES ('$username', '$fname', '$lname', '$email', '" . md5($password) . "')";
        $result   = mysqli_query($con, $query);

            if ($result) {
                echo "<div><h3>Registered successfully.</h3></div>";
                header("Location: login.php");
            }
            else{
                echo "<div><h3>Required fields are missing...</h3></div>";
            }
          }
        }
        else{
        ?>
    <center>
        <form class=" align-items-center justify-content-center" action="" method="post">
            <div class="form-group">
                <h2><label for="username" style="color: white">Username:</label></h2>
                <input class="form-control" type="text" id="username" name="username" placeholder="Username" required />
            </div>
            <div class="form-group">
                <h2><label for="fname" style="color: white">First name:</label></h2>
                <input class="form-control" type="text" id="fname" name="fname" placeholder="First Name" required /><!-- comment -->
            </div>
            <div class="form-group">
                <h2><label for="lname" style="color: white">Last name:</label></h2>
                <input class="form-control" type="text" id="lname" name="lname" placeholder="Last Name" required /><!-- comment -->
            </div><!-- comment -->
            <div class="form-group">
                <h2><label for="email" style="color: white">Email:</label></h2>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email" required />
            </div>
            <div class="form-group">
                <h2><label for="password" style="color: white">Password:</label></h2>
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" required />
            </div>
            <br>
            <div class="form-group">
                <input style="font-size: 20px" type="submit" value="Submit" name="submit" class="form-control"/>
            </div>
        </form>
    </center>
        <?php
        }
        ?>
        <br>
    <center>
      <h3 style="color: white">Already have an account? <u><a href="login.php" style="color: white">Login</a></u> here.</h3>
      <br>
      <h3 style="color: white">Not what you wanted to see? Go <a href="index.php" style="color: white" ><u>back</u></a> to home.</h3>
    </center>

@endsection