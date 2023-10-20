const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");

canvas.style.backgroundColor = "green";
canvas.style.position = "relative";

const xpos = 10;
let y = canvas.height / 2;
const speed = 5;

console.log(xpos);

// class Circle {
//   constructor(xpos, ypos, radius, speed) {
//     this.xpos = xpos;
//     this.ypos = ypos;
//     this.radius = radius;
//     this.speed = speed;

//     this.dx = xpos * speed;
//   }

//   draw(ctx) {
//     ctx.beginPath();
//     ctx.arc(this.xpos, this.ypos, this.r, 0, Math.PI * 2);
//     ctx.fillStyle = "white";
//     ctx.fill();
//     ctx.closePath();
//   }

//   update() {}
// }

ctx.beginPath();
ctx.arc(10, y, 10, 0, Math.PI * 2);
ctx.fillStyle = "white";
ctx.fill();
ctx.closePath();

// ctx.offsetLeft++;

// const sirkel = new Circle(10, y, 10, 5);
// sirkel.draw(ctx);

// function move() {
//   ctx.offsetleft += speed;
//   requestAnimationFrame(move);
// }

// console.log(ctx);

// move();
