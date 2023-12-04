@extends('layouts.frontendOtherPage')

@section('content')

<?php
            if(isset($_POST['username'])){
                $username = stripslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($con, $username);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);

                $query = "SELECT * FROM `users` WHERE username='$username' AND password='" .md5($password) . "'";
                $result = mysqli_query($con, $query) or die(mysql_error());
                $rows = mysqli_num_rows($result);
                if($rows == 1) {
                    $_SESSION['username'] = $username;
            header("Location: index.php");
                }
                else{
                  header("Location: login_error.php");
                }
            }
            else{
                ?>
    <center>
        <form method="post" name="login">
            <h1 style="color: white">Login to Lucien's Place For Things- </h1><!-- comment -->
            <br><br>
            <div class="form-group">
                <h2 style="color: white"><label for="username">Username:</label></h2>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username"/>
            </div>
            <div class="form-group">
                <h2 style="color: white"><label for="password">Password:</label></h2>
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
        <h3 style="color: white">Don't have an account? <br> Click <u><a href="register.php">here</a></u> to register.</h3>
        <br>
        <h3 style="color: white">Not what you wanted? <br> Click <u><a href="index.php">here</a></u> to return to home.</h3>
    </center>
        <?php
            }
            ?>

@endsection