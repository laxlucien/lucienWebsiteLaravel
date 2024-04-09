@extends('layouts.frontendOtherPage')

@section('content')

<div>
    <center>
        <br>
        <h1 style="width: 15%;" class="styleBorder">About -</h1>
        <br>
        <table>
            <tr>
                <center>
                <td class="styleBorder">
                    <center>
                    <p><h3 style="font-size: 35px;">About -</h3></p>
                    <br>
                    <p>
                        Lucien Lee grew up in Boise Idaho, and attended High School at 
                        Bishop Kelly High School. He then went on to study computer science 
                        at The University of Idaho. Lucien will be graduating in Spring of 2024 and 
                        can't wait to apply all of the different skills he has learned over the years 
                        to industry. 
                    </p>
                    <br>
                    <p>
                        Lucien always liked to have his 
                        foot in many different parts of everything. Since he was never able 
                        to decide on one thing to focus all of his time on, he created this website.
                        With this website, he and his friends are able to display anything that they
                        feel is right with the public at any time, from any place.
                    </p>
                    <br>
                    <p>
                        Lucien's most recent endevor was his Senior Design Project for his Capstone class
                        at the University of Idaho. This project was comprised of a team of 5 other people, 6
                        incluing himself. In this project the team - The Irradiated Rascals - worked to provide 
                        their sponsors at NASA Ames a CubeSat payload that would meaure radiation data in Low Earth Orbit (LEO).
                        Through this project Lucien has learned a lot about not only space exploration, but also what it takes
                        to build a space ready payload to accomplish the goal that has been laid out before the team. 
                    </p>
                    <br>
                    <p>
                        I hope you enjoy viewing and using this website just as much as 
                        I enjoyed creating it. If you would like to contribute to this website,
                        feel free to make an account with us, and start uploading your content!
                    </p>
                    <br>
                    <p>Cheers!</p>
                    </center>        
                </td>
                <td style="width:40%">
                    <center>         
                        <!------------ Photo of lucien here --------->
                        <img stlye="width: 80%;" class="styleBorder" src="{{ asset('photos/20220608_160333.jpg') }}" alt="Lucien Profile Picture">
                    </center>        
                </td>
            </center>        
        </tr>
    </table>
    </center>
</div>
<br>
<!--- this is for the hyperlinks at the bottom of the page --->
<center>
    <div>
        <div style=" width: 20%;" class="styleBorder">
            <h3>Links to Lucien's Content -</h3>
        </div>
        <br>
        <div style="position: relative; align-items: center; display: inline-flex; width: 40%; color:white; background-color: #0C0A09; border-radius: 8px; padding:50px;">
            <div style="display: flex; justify-content: center; padding: 15px; position: absolute; left: 0%">
                <h3><u>Instagram -</u> <a href="https://www.instagram.com/the_lucien_lee/"><img style="padding-left: 10px; padding-top: 5px; width: 45px;" src="{{ asset('photos/instagram.png') }}"></a></h3>
            </div>
            <div style="padding: 15px; position: absolute; left: 40%">
                <h3><u>LinkedIn -</u>  <a href="https://www.linkedin.com/in/lucien-lee/"><img style="width:50px; padding-left: 10px; padding-top: 5px;" src="{{ asset('photos/linkedIn.png') }}"></a></h3>
            </div>
            <div style="padding: 15px; position: absolute; left: 75%">
                <h3><u>Resume -</u>  <a href="{{ asset('photos/Lucien Lee Computer Science 2023-4.pdf') }}"><img style="width:50px; padding-left: 10px; padding-top: 5px;" src="{{ asset('photos/resume.png') }}"></a></h3>
            </div>
        </div>
    </div>
</center>
<br>

@endsection
