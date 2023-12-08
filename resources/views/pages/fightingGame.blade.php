@extends('layouts.frontendFightingLayout')

@section('content')

<center>
    <div class="BitText" style="position: relative; display: inline-block;">
        <div class="BitText" style="position: absolute; display: flex; width: 100%; align-items: center; padding: 20px;">
            <!-- Player health-->
            <div class="BitText" style="position: relative; width: 100%; display: flex; justify-content: flex-end; border-top: 4px solid black; border-bottom: 4px solid black; border-left:4px solid black;">
                <div class="BitText" style="background-color: #78716C; height: 30px; width: 100%;"></div>
                <div class="BitText" id="playerHealth" style="position: absolute; background: #F43F5E; top: 0; bottom: 0; right: 0; width: 100%"></div>
            </div>
            <!--timer-->
            <div class="BitText" id="timer" style="background-color: #262626; width: 100px; height: 50px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; border: 4px solid black; color: white;">10</div>
            <!--enemy health-->
            <div class="BitText" style="position: relative;  width: 100%; border-top: 4px solid black; border-bottom: 4px solid black; border-right: 4px solid black">
                <div class="BitText" style="background-color: #78716C; height: 30px;"></div>
                <div class="BitText" id="enemyHealth" style="position: absolute; background: #F43F5E; top: 0; bottom: 0; left: 0; right: 0;"></div>
            </div>
        </div>
        <div class="BitText" style="position: absolute; align-items: center; justify-content: center; padding-top: 250px; padding-left: 387px;">
            <div class="BitText" id="displayText" style="color: white; justify-content: center; top:0; right: 500; bottom: 0; left: 0; display: none; padding: 20px;">Tie</div>
            <div class="BitText" id="restart" style=" color: white; align-items: center; justify-content: center; display: none;">Restart</div>
        </div>
        <canvas></canvas>
    </div>
</center>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js" integrity="sha512-7Au1ULjlT8PP1Ygs6mDZh9NuQD0A5prSrAUiPHMXpU6g3UMd8qesVnhug5X4RoDr35x5upNpx0A6Sisz1LSTXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="fightingGame/utils.js"></script>
<script src="fightingGame/classes.js"></script>
<script src="fightingGame/mainScript.js"></script>

@endsection