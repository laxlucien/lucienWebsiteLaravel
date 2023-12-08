function rectangularCollision({rectangle1, rectangle2}) {
    //need to fix this box - isn't checking the right variables
    //console.log(rectangle1.attackBox.position.x <= Math.abs(rectangle2.position.x) && rectangle1.attackBox.position.x + rectangle1.attackBox.width >= Math.abs(rectangle2.position.x) - rectangle2.width)
    return (rectangle1.attackBox.position.x <= Math.abs(rectangle2.position.x) && rectangle1.attackBox.position.x + rectangle1.attackBox.width >= Math.abs(rectangle2.position.x) - rectangle2.width && rectangle1.isOnGround === true);
}

function rectangularCollision2({rectangle1, rectangle2}) {
    //need to fix this box - isn't checking the right variables
    //console.log(rectangle2.position.x <= Math.abs(rectangle1.attackBox.position.x) && (Math.abs(rectangle1.position.x) - rectangle1.attackBox.width - rectangle1.attackBox.offset.x <= rectangle2.position.x));
    return (rectangle2.position.x <= Math.abs(rectangle1.attackBox.position.x) && (Math.abs(rectangle1.position.x) - (1.5*rectangle1.attackBox.width) - rectangle1.attackBox.offset.x <= rectangle2.position.x) && rectangle1.isOnGround === true);
}

function restart(){
    location.reload();
}

function determineWinner({player, enemy, timerId}) {
    clearTimeout(timerId);
    document.querySelector('#displayText').style.display = 'flex';
    if(player.health === enemy.health){
        document.querySelector('#displayText').innerHTML = '     Tie     ';
    }else if(player.health > enemy.health){
        document.querySelector('#displayText').innerHTML = 'Player 1 Wins'; 
    }else if(enemy.health > player.health){
        document.querySelector('#displayText').innerHTML = 'Player 2 Wins'; 
    }

    restartButton = document.querySelector('#restart');
    restartButton.style.display = 'flex';
    restartButton.addEventListener('click', restart);
}

let timer = 120;
let timerId;
function decreaseTimer() {
    if(timer > 0){
        timerId = setTimeout(decreaseTimer, 1000);
        timer--;
        document.querySelector('#timer').innerHTML = timer;
    }
    if(timer === 0){
        determineWinner({player, enemy, timerId});
    }
}