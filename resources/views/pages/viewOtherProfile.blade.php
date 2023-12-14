@extends('layouts.frontendOtherPage')

@section('content')

<center>
    <br>
    <table>
        <tr>
            <h3 style="color:white; width: 20%; background-color: #27272A; padding: 10px; border-radius: 8px;">{{ $requestedUser->username }}'s profile</h3> 
        </tr>
        <tr>
            <td style="width: 40%; color: white">
                <!--- Profile Picture will go here --->
                <?php
                    $checkForPfp = $requestedUser->pfp;
                    if(is_null($checkForPfp)){
                        echo "<img style='background-color: #27272A; padding: 10px; border-radius: 8px;' src='{{ asset('photos/default-profile.jpeg') }}' alt='default profile image for a user'>";
                    }else{
                        ?>
                        <img style="width:320px; background-color: #27272A; padding: 10px; border-radius: 8px;" src="{{ asset('uploads/profiles/'.$checkForPfp) }}" alt="The image of the user gotten from <?php echo $checkForPfp; ?>">
                        <?php
                    }
                ?>
            </td>
            <td style="color: white; width: 40%; ">
                <!--- user info goes here --->
                <h3 style="color:white; background-color: #27272A; padding: 10px; border-radius: 8px;"> <u>Username:</u> {{$requestedUser->username}}</h3>
                <h3 style="color:white; background-color: #27272A; padding: 10px; border-radius: 8px;"> <u>Name:</u> {{$requestedUser->fname}} {{$requestedUser->lname}}</h3>
                <h3 style="color:white; background-color: #27272A; padding: 10px; border-radius: 8px;"> <u>Email:</u> {{$requestedUser->email}}</h3>
                <h3 style="color:white; background-color: #27272A; padding: 10px; border-radius: 8px;"> <u>Bio:</u> 
                    <?php
                        $checkForBio = $requestedUser->bio;
                        $userName = $requestedUser->username;
                        if(is_null($checkForBio)){
                            echo "<u>$userName</u> has not written a bio written yet.";
                        }else{
                            echo "$checkForBio";
                        }
                    ?>
                </h3>
            </td>
        </tr>
        </tr>
    </table>
    <!--- need to add all of the photos that they have contributed to down here eventually --->
</center>

@endsection