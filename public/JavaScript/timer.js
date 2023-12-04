var finalTime = 0;
var currentTimeSec = 0;
var currentTimeMin = 0;
var timer = null;

function startTimer(){
    currentTimeSec = 1;
    currentTimeMin = 0;
    timer = setInterval(function(){
        if((currentTimeMin < 10) && (currentTimeSec < 10)){
            document.getElementById("timer").innerHTML = '0' + currentTimeMin + ':' + '0' + currentTimeSec;
        }else if((currentTimeMin < 10) && (currentTimeSec >= 10) && (currentTimeSec < 60)){
            document.getElementById("timer").innerHTML = '0' + currentTimeMin + ':' + currentTimeSec;
        }else if((currentTimeMin >= 10) && (currentTimeSec < 10)){
            document.getElementById("timer").innerHTML = currentTimeMin + ':' + '0' + currentTimeSec;
        }else if((currentTimeMin >= 10) && (currentTimeSec >= 10) && (currentTimeSec < 60)){
            document.getElementById("timer").innerHTML = currentTimeMin + ':' + currentTimeSec;
        }

        currentTimeSec++;
        finalTime++;

        if(currentTimeSec === 60){
            currentTimeMin++;
            currentTimeSec = 0;
        }
    }, 1000);
}

function stopTimer() {
    clearInterval(timer);
}