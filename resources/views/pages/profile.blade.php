@extends('layouts.frontendOtherPage')

@section('content')

<center>
    <br>
    <table>
        <tr>
            <h3 style="width: 20%;" class="styleBorder">{{ Auth::user()->username}}'s profile</h3> 
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
                <h3 class="styleBorder"> <u>Username:</u> {{Auth::user()->username}}</h3>
                <h3 class="styleBorder"> <u>Name:</u> {{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                <h3 class="styleBorder"> <u>Email:</u> {{Auth::user()->email}}</h3>
                <h3 class="styleBorder"> <u>Bio:</u> 
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
    <!--- need to add all of the photos that they have contributed to down here eventually --->
    <div style="position: relative; align-items: center; align-text: center; width: 90%;">
        <div style="padding:5px; color:white; background-color: #27272A; border-radius: 8px; width: 40%">
            <h3> View the photos that you have uploaded: </h3>
        </div>
        <br>
        <div style="padding:5px; color: white; background-color: #27272A; border-radius: 8px; width: 80%;">
            <!--- this is where the images will go in the for loop --->
            <table>
                <?php 
                    $i = 0;
                ?>
                @foreach($photo as $var)
                    <?php
                        if($i == 3){
                            echo "</tr>";
                        }
                        if($i == 0){
                            echo "<tr>";
                        }

                        if(Auth::user()->username == $var->username){
                    ?>
                    <td style="width:400px; padding:10px;">
                        <a href="{{ url('viewPhoto/'.$var->id) }}">
                            <img style="width: 400px;" src="{{ asset('upload/mainSitePhotos/'.$var->uploadedPhoto) }}">
                        </a>
                    </td>
                    <?php 
                        }
                        $i += 1; 
                    ?>
                @endforeach
                <?php
                    echo "</tr>";
                ?>
            </table>
        </div>
    </div>
</center>

@endsection