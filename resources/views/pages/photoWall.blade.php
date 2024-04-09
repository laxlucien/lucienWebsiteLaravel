@extends('layouts.frontendOtherPage')

@section('content')

<center>
    <h1 style="width: 15%;" class="styleBorder">Photos -</h1>
    @guest
        <h3 style="width: 60%;" class="styleBorder">
            Browse the various photos that various people have uploaded to the website below
        </h3>
    @else
        <h3 style="width: 60%;" class="styleBorder">
            Hello {{Auth::user()->username}}, would you like to <u><a href="{{ url('addToPhotoWall/'.$user) }}">upload</a></u> a photo?
        </h3>
    @endguest
    <br>
    <?php
        $i = 0;
    ?>
    <table style="width: 90%;" class="styleBorder">
        @foreach ($photo as $var)
            <?php
                if($i == 3){
                    echo "</tr>";
                    $i = 0;
                }
                if($i == 0){
                    echo "<tr>";
                }
            ?>

                <td style="width: 400px; padding: 10px;">
                    <a href="{{ url('viewPhoto/'.$var->id) }}">
                        <img style="width: 400px;" src="{{ asset('upload/mainSitePhotos/'.$var->uploadedPhoto) }}">
                    </a>
                </td>

            <?php $i += 1; ?>
        @endforeach
        <?php
            echo "</tr>";
        ?>
    </table>
    
</center>

@endsection