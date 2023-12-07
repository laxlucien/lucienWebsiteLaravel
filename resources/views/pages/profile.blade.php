@extends('layouts.frontendOtherPage')

@section('content')

<center>
    <br>
    <table>
        <tr>
            <h3 style="color:white; width: 20%; background-color: #27272A; padding: 10px; border-radius: 8px;">{{ Auth::user()->username}}'s profile</h3> 
        </tr>
        <tr>
            <td style="width: 40%; color: white">
                <!--- Profile Picture will go here --->
                <?php
                    $checkForPfp = Auth::user()->pfp;
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
                <h3 style="color:white; background-color: #27272A; padding: 10px; border-radius: 8px;"> <u>Username:</u> {{Auth::user()->username}}</h3>
                <h3 style="color:white; background-color: #27272A; padding: 10px; border-radius: 8px;"> <u>Name:</u> {{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                <h3 style="color:white; background-color: #27272A; padding: 10px; border-radius: 8px;"> <u>Email:</u> {{Auth::user()->email}}</h3>
                <h3 style="color:white; background-color: #27272A; padding: 10px; border-radius: 8px;"> <u>Bio:</u> 
                    <?php
                        $checkForBio = Auth::user()->bio;
                        $userName = Auth::user()->username;
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
    <br>
    <?php
        foreach ($user as $person){
            if($person->username == Auth::user()->username){
                $id = $person->id;
            }
        }
    ?>
    <h3 style="color: white; background-color: #27272A; padding: 10px; border-radius: 8px;">Click <a href="{{ url('changeUserInfo/'.$id) }}"><u>here</u></a> to change your information</h3>
    <br>
</center>

@endsection