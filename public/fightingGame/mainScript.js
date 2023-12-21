const canvas = document.querySelector('canvas');
const c = canvas.getContext('2d');

canvas.width = 1024;
canvas.height = 558;

c.fillRect(0, 0, canvas.width, canvas.height);

const gravity = 1.5;

const background = new Sprite({
    position: {
        x: 0,
        y: 0
    },
    imageSrc: 'fightingGame/Images/Reference-Image.png'
});

const player = new Fighter({
    position: {
        x: 0,
        y: 0
    },
    velocity: {
        x: 0,
        y: 0
    },
    color: 'red',
    offset: {
        x: 0,
        y: 0
    },
    imageSrc: 'fightingGame/Images/Colour1/Outline/120x80_PNGSheets/_Idle.png',
    frames: 10,
    scale: 2.5,
    offset: {
        x: 100,
        y: 60
    },
    sprites: {
        idle: {
            imageSrc:'fightingGame/Images/Colour1/Outline/120x80_PNGSheets/_Idle.png',
            frames: 10
        },
        run: {
            imageSrc:'fightingGame/Images/Colour1/Outline/120x80_PNGSheets/_Run.png',
            frames: 10
        },
        jump: {
            imageSrc:'fightingGame/Images/Colour1/Outline/120x80_PNGSheets/_Jump.png',
            frames: 3
        },
        fall: {
            imageSrc:'fightingGame/Images/Colour1/Outline/120x80_PNGSheets/_Fall.png',
            frames: 3
        },
        attack1: {
            imageSrc:'fightingGame/Images/Colour1/Outline/120x80_PNGSheets/_Attack.png',
            frames: 4
        },
        takeHit: {
            imageSrc:'fightingGame/Images/Colour1/Outline/120x80_PNGSheets/_SlideFull.png',
            frames: 4
        },
        death: {
            imageSrc:'fightingGame/Images/Colour1/Outline/120x80_PNGSheets/_DeathNoMovement.png',
            frames: 10
        }
    },
    attackBox: {
        offset: {
            x: 100,
            y: 50
        },
        width: 100,
        height: 80
    },
    hitBox: {
        offset: {
            x: 0,
            y: 45
        },
        width: 75,
        height: 105
    }
});

const enemy = new Fighter({
    position: {
        x: -1024,
        y: 0
    },
    velocity: {
        x: 0,
        y: 0
    },
    color: 'blue',
    offset: {
        x: 0,
        y: 0
    },
    imageSrc: 'fightingGame/Images/Colour2/Outline/120x80_PNGSheets/_Idle.png',
    frames: 10,
    scale: 2.5,
    offset: {
        x: 100,
        y: 60
    },
    sprites: {
        idle: {
            imageSrc:'fightingGame/Images/Colour2/Outline/120x80_PNGSheets/_Idle.png',
            frames: 10
        },
        run: {
            imageSrc:'fightingGame/Images/Colour2/Outline/120x80_PNGSheets/_Run.png',
            frames: 10
        },
        jump: {
            imageSrc:'fightingGame/Images/Colour2/Outline/120x80_PNGSheets/_Jump.png',
            frames: 3
        },
        fall: {
            imageSrc:'fightingGame/Images/Colour2/Outline/120x80_PNGSheets/_Fall.png',
            frames: 3
        },
        attack1: {
            imageSrc:'fightingGame/Images/Colour2/Outline/120x80_PNGSheets/_Attack.png',
            frames: 4
        },
        takeHit: {
            imageSrc:'fightingGame/Images/Colour2/Outline/120x80_PNGSheets/_SlideAll.png',
            frames: 4
        },
        death: {
            imageSrc:'fightingGame/Images/Colour2/Outline/120x80_PNGSheets/_DeathNoMovement.png',
            frames: 10
        }
    },
    attackBox: {
        offset: {
            x: 100,
            y: 50
        },
        width: 100,
        height: 80
    },
    hitBox: {
        offset: {
            x: 0,
            y: 45
        },
        width: 75,
        height: 105
    }
});



//these are the keys that we wil be able to use when in our game
const keys = {
    a: {
        pressed: false
    },
    d: {
        pressed: false
    },
    w: {
        pressed: false
    },
    ArrowRight: {
        pressed: false
    },
    ArrowLeft: {
        pressed: false
    },
    ArrowUp: {
        pressed: false
    }
};

decreaseTimer();

function animate() {
    window.requestAnimationFrame(animate)
    background.update();

    //this flips the canvas
    c.fillStyle = 'rgba(255, 255, 255, 0.12)';
    c.fillRect(0, 0, canvas.width, canvas.height);
    player.update();
    c.save();
    c.scale(-1, 1);
    enemy.update();
    c.restore();

    player.velocity.x = 0;
    enemy.velocity.x = 0;

    //player movement
    if(keys.a.pressed && player.lastKey === 'a' && player.position.x >= 5) {
        player.velocity.x = -10;
        player.switchSprite('run');
    }else if(keys.d.pressed && player.lastKey === 'd' && player.position.x <= 950) {
        player.velocity.x = 10;
        player.switchSprite('run');
    }else{
        player.switchSprite('idle');
    }

    //jumping
    if(player.velocity.y < 0){
        player.switchSprite('jump');
    }else if(player.velocity.y > 0){
        player.switchSprite('fall');
    }

    //enemy movement
    if(keys.ArrowLeft.pressed && enemy.lastKey === 'ArrowLeft' && Math.abs(enemy.position.x) >= 75) {
        enemy.velocity.x = 10;
        enemy.switchSprite('run');
    }else if(keys.ArrowRight.pressed && enemy.lastKey === 'ArrowRight' && Math.abs(enemy.position.x) <= 1020) {
        enemy.velocity.x = -10;
        enemy.switchSprite('run');
    }else{
        enemy.switchSprite('idle');
    }

    //jumping
    if(enemy.velocity.y < 0){
        enemy.switchSprite('jump');
    }else if(enemy.velocity.y > 0){
        enemy.switchSprite('fall');
    }

    //detect colision and when enemy is hit
    if (rectangularCollision({rectangle1: player, rectangle2: enemy}) && player.isAttacking && player.framesCurrent === 2){
        player.isAttacking = false;
        enemy.takeHit();
        //document.querySelector('#enemyHealth').style.width = enemy.health + '%'; 
        gsap.to('#enemyHealth', {
            width: enemy.health + '%'
        })
    }

    //if player misses
    if(player.isAttacking && player.framesCurrent === 2){
        player.isAttacking = false;
    }

    if (rectangularCollision2({rectangle1: enemy, rectangle2: player}) && enemy.isAttacking && enemy.framesCurrent === 2){
        enemy.isAttacking = false;
        player.takeHit();
        //document.querySelector('#playerHealth').style.width = player.health + '%';
        gsap.to('#playerHealth', {
            width: player.health + '%'
        })
    }

    //if player misses
    if(enemy.isAttacking && enemy.framesCurrent === 2){
        enemy.isAttacking = false;
    }

    //end game if one person is dead
    if(enemy.health <= 0 || player.health <= 0){
        determineWinner({player, enemy, timerId})
    }
}

animate();

//for the key presses
window.addEventListener('keydown', (event) => {
    if(!player.dead){
        switch (event.key) {
            case 'd':
                keys.d.pressed = true;
                player.lastKey = 'd';
                break;
            case 'a':
                keys.a.pressed = true;
                player.lastKey = 'a';
                break;
            case 'w':
                if(player.isOnGround){
                    player.velocity.y = -30;
                }
                keys.w.pressed = true;
                break;
            case 's':
                player.attack();
                break;
        }
    }

    if(!enemy.dead){
        switch(event.key){
            case 'ArrowLeft':
                keys.ArrowLeft.pressed = true;
                enemy.lastKey = 'ArrowLeft';
                break;
            case 'ArrowRight':
                keys.ArrowRight.pressed = true;
                enemy.lastKey = 'ArrowRight';
                break;
            case 'ArrowUp':
                keys.ArrowUp.pressed = true;
                if(enemy.isOnGround){
                    enemy.velocity.y = -30;
                }
                break;
            case 'ArrowDown':
                enemy.attack();
                break;
        }
    }
});

//for the key releases
window.addEventListener('keyup', (event) => {
    switch (event.key) {
        case 'd':
            keys.d.pressed = false;
            break;
        case 'a':
            keys.a.pressed = false;
            break;
        case 'w':
            keys.w.pressed = false;
            break;
        case 'ArrowLeft':
            keys.ArrowLeft.pressed = false;
            break;
        case 'ArrowRight':
            keys.ArrowRight.pressed = false;
            break;
        case 'ArrowUp':
            keys.ArrowUp.pressed = false;
            break;
    }
});

//to prevent the other things from happening in the browser
window.addEventListener("keydown", function(e) {
    if(["Space", "ArrowUp", "ArrowDown", "ArrowLeft", "ArrowRight"].indexOf(e.code) > -1) {
        e.preventDefault();
    }
}, false);