const image = document.getElementById("image");
const container = document.querySelector(".container");

console.log(image.naturalWidth);

const width = image.naturalWidth;
const height = image.naturalHeight;

const x = 5;
const y = 3;

const div = document.createElement("div");
const grid = container.appendChild(div);
console.log(div);
