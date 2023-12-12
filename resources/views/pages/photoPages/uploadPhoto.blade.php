@extends('layouts.frontendOtherPage')

@section('content')

<center>

    <!--- for the status error if there is one... --->
    @if (session('status'))
        <h3 style="width: 60%; color: white; background-color: #27272A; padding: 10px; border-radius: 8px;">
            {{ session('status') }}
        </h3>
        <br>
    @endif

    <h1 style="width: 20%; color:white; background-color: #27272A; padding: 10px; border-radius: 8px;">Upload Photos -</h1>
    <br>
    <form class="align-items-center justify-content-center" action="{{ url('storePhotoUpload/'.$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <h3><label for="title" style="color: white; background-color: #27272A; padding: 10px; border-radius: 8px; width: 20%;">Photo Title:</label></h3>
            <input class="form-control" type="text" id="title" name="title" placeholder="Photo Title..." required />
        </div>

        <div class="form-group">
            <h3><label for="description" style="color: white; background-color: #27272A; padding: 10px; border-radius: 8px; width: 20%;">Photo Description:</label></h3>
            <input class="form-control" type="text" id="description" name="description" placeholder="Photo description..." required />
        </div>

        <div class="form-group">
            <h3><label for="location" style="color: white; background-color: #27272A; padding: 10px; border-radius: 8px; width: 20%;">Photo Location:</label></h3>
            <input class="form-control" type="text" id="location" name="location" placeholder="Photo Location..." required />
        </div>

        <div class="form-group">
            <div><h3><label for="uploadedPhoto" style="color: white; background-color: #27272A; padding: 10px; border-radius: 8px; width: 20%;">Upload Photo:</label></h3></div>
            <div style="width: 50%; display: flex; background-color: white; border-radius: 8px; padding: 10px; text-align: center; align-items: center;"><input style="width:50%" type="file" name="uploadedPhoto" required /></div>
        </div>
        
        <br>

        <div class="form-group">
            <input style="font-size: 20px" type="submit" value="Submit" name="submit" class="form-control"/>
        </div>
    </form>

    <br><br>

    <h3 style="width: 20%; color:white; background-color: #27272A; padding: 10px; border-radius: 8px;">Disclaimers:</h3>

    <h3 style="width: 70%; color:white; background-color: #27272A; padding: 10px; border-radius: 8px;">
        Please fill out the infromation that is asked for below so that your image can be uploaded to 
        the website. Don't worry, your photo is your property, and this is only a place to show off your work. 
        This is not a place for people to take credit for other people's photos. Enough of that boring talk, 
        fill out the form and show off what you got!
    </h3>
    <h3 style="width: 70%; color:white; background-color: #27272A; padding: 10px; border-radius: 8px;">
        If you do not get the message telling you that your photo has been uploaded, then make sure you have a 
        valid file extention of one of the following: jpeg, jpg, png, bmp, and tiff. If you do not recieve the 
        confirmation message, then your photo will not be uploaded to the website. Try to upload again if you did
        not recieve a confirmation message on the previous submission. 
    </h3>
    <br>
</center>

@endsection