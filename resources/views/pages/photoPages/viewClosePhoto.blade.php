@extends('layouts.frontendOtherPage')

@section('content')

<center>
    <div style="width: 90%; position: relative; display:inline-block;">
        <div>
            <h1 style="padding: 10px; color:white; background-color: #27272A; border-radius: 8px; position: relative; align-items: center; align-text: center; width: 40%;">
                Selected Photo Information-
            </h1>
        </div>
        <div style="padding-top: 10px;">
            <!--- This is for the bottom of the page after they ahve seen all of the users information about the photo --->
            <h3 style="padding: 10px; color:white; background-color: #27272A; border-radius: 8px; position: relative; align-items: center; align-text: center; width: 80%;">
                Would you like to see more of this photographers work? Click <a href="{{ url('otherProfile/'.$currentUser->id) }}"><u>here</u></a> in order to see their profile.
            </h3>
        </div>
        <div style="position: absolute; display: flex; width: 100%; align-items: center; padding: 20px;">

            <!--- this will be the div for the left side of the html doc --->
            <!--- This will have the information for the photo that was selected --->
            <div style="padding: 20px; color:white; background-color: #27272A; border-radius: 8px; position: relative; align-items: center; align-text: center; width: 25%;">
                <div>
                    <h3 style="color: white;"><u>Photo Information:</u></h3>
                </div>

                <div style="padding: 5px; position: relative;">
                    <h3 style="color: white;"><u>Photographer:</u></h3>
                    <div style="display: inline-flex">
                        <a href="{{ url('otherProfile/'.$currentUser->id) }}">
                            <h3 style="color: white; padding-right: 15px;">{{ $photo->username }}</h3>
                        </a>
                        <?php 
                            $checkForPfp = $currentUser->pfp;
                            if(is_null($checkForPfp)){
                                echo "<img style='border-radius: 8px; width: 45px;' src='{{ asset('photos/default-profile.jpeg') }}' alt='default profile image for a user'>";
                            }else{
                                ?>
                                <img style="border-radius: 8px; width: 45px;" src="{{ asset('uploads/profiles/'.$checkForPfp) }}" alt="image of the photographer">
                                <?php
                            }
                        ?>
                    </div>
                </div>

                <div>
                    <h3 style="color:white;"><u>Photo Title:</u></h3>
                    <h3 style="color:white;">{{ $photo->title }}</h3>
                </div>

                <div style="padding: 5px">
                    <h3 style="color:white;"><u>Photo Description:</u></h3>
                    <h3 style="color: white;">{{ $photo->description }}</h3>
                </div>

                <div>
                    <h3 style="color:white;"><u>Photo Location:</u></h3>
                    <h3 style="color:white;">{{ $photo->location }}</h3>
                </div>
            </div>

            <!--- blank space to seperate the two sections --->
            <div style="padding: 10px">
                <div></div>
            </div>

            <!--- this will be the div for the right side of the html doc --->
            <!--- This will show the image that was selected as big as possible --->
            <div style="padding: 20px; color:white; background-color: #27272A; border-radius: 8px; position: relative; align-items: center; width: 75%;">
                <div style="padding: 5px;">
                    <img style="width: 100%;" src="{{ asset('upload/mainSitePhotos/'.$photo->uploadedPhoto) }}" alt="{{ $photo->description }}">
                </div>
            </div>

        </div>

    </div>
</center>

@endsection