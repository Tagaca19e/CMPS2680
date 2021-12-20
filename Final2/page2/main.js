var canvas = document.getElementById("canv");
var c = canvas.getContext("2d");

const card = document.getElementById("card");
const cardScore = document.getElementById("card-score");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let highest = 0;

function restartGame(button) {
  card.style.display = "none";
  button.blur();
  location.reload();
}

//=====Our score here=====
var score = 0;
let over = false;
class Rock {
  constructor(x, y) {
    this.x = x;
    this.y = y;
    this.w = Math.floor(Math.random() * (50 - 20) + 20);
    this.size = 50;
    this.h = Math.floor(Math.random() * (50 - 25) + 20);
  }
  show() {
    //  var randomColor = "#" + Math.floor(Math.random() * 16777215).toString(16);
    c.fillStyle = "yellow";
    c.fillRect(this.x, this.y, this.w, this.h);
  }

  //======IF THE ROCK IS HIT THEN WE WILL SAY GAME OVER======
  play() {
    if (
      this.x < p.x + p.w &&
      this.x + this.w > p.x &&
      this.y < p.y + p.h &&
      this.y + this.h > p.y
    ) {
      //IF you got hit then you will be out and prompt you to restart the
      card.style.display = "block";
      cardScore.textContent = score;
      over = true;
      highest = highest < score ? score : highest;
      localStorage.setItem("high", highest);
    } else {
      increase();
    }
  }
}

let updated = localStorage.getItem("high");
highest = updated;
console.log(updated, "this is update");
class Player {
  constructor(x, y) {
    this.x = x;
    this.y = y;
    this.w = 40;
    this.h = 40;
    this.size = 50;
    this.ySpeed = 0;
    this.xSpeed = 0.4;
  }
  show() {
    c.fillStyle = "#00ffab";
    c.fillRect(this.x, this.y, this.w, this.h);
  }
  play() {
    this.y += this.ySpeed;
    this.ySpeed += gravity;

    if (this.y >= 750 - 40) {
      this.ySpeed = 0;
      canJump = true;
    } else {
      canJump = false;

      console.log("Eidmone");
    }
  }
}

function increase() {
  if (!over) {
    setTimeout(score++, 100000000);
  }
}

var p;
var gravity = 0.8;

var canJump = true;

var rocks = [];

var rockX = 800;

window.onload = function () {
  start();
  setInterval(play, 10);
};

let canscore = true;

function start() {
  p = new Player(100, 710);

  for (let i = 0; i < 100; i++) {
    var r = new Rock(rockX, 710);
    rocks.push(r);
    rockX += Math.floor(Math.random() * 500) + 300;
  }

  canscore = true;

  p.xSpeed = 7;
}

function isPast(p, Rock) {
  // console.log("This is pastsdfsdf");
  return (
    p.x + p.size / 2 > Rock.x + Rock.size / 4 &&
    p.x + p.size / 2 < Rock.x + (Rock.size / 4) * 3
  );
}

//THIS WILL BE OUR FLOOR THAT WILL BE UPDATING

function play() {
  canvas.width = canvas.width;
  //This will be full width
  c.fillStyle = "#f0ff57";
  c.fillRect(0, 750, canvas.width, 5);
  //player
  p.show();
  p.play();
  //rocks
  for (let i = 0; i < rocks.length; i++) {
    rocks[i].show();
    rocks[i].play();
    rocks[i].x -= p.xSpeed;
  }

  if (isPast(p, rocks) && canscore) {
    console.log(isPast, "This is past");
    console.log("Works for me");
    canScore = false;

    score++;
  }
  console.log(isPast(p, rocks) && canscore);

  console.log(score);
  //show score
  document.getElementById("showScore").innerHTML = "Score: " + score;
  document.getElementById("highestScore").innerHTML = "Highest: " + highest;
  document.getElementById("nextLevel").innerHTML =
    "Next Lvl: " + (90000 - score);

  if (score === 90000) {
    window.location.replace(
      "http://127.0.0.1:5500/CMPS2680/Final2/page3/index.html"
    );
  }
}

function changeSpeed() {
  p.xSpeed += 0.1;
}

// function increaseScore() {
//   score++;
// }

// As  you last longer it gets harder
setInterval(changeSpeed, 500);

function keyDown(e) {
  if (e.code === "Space" && canJump) {
    p.ySpeed = -14;
  }
}

document.onkeydown = keyDown;
