
let x = window.innerWidth;
let y = window.innerHeight/2;
let oldX =  window.innerWidth;
let offset = 0;
let cnv;

var p1,p2;
var shell1,shell2;


function setup(){

  let myDiv = select('#bigBox');
  x = myDiv.width;
  offset = (oldX-x)/2;

  cnv = createCanvas(x, y);
  cnv.position(offset,);

  p1 = new Player("1",width/4,height-height/4);
  p2 = new Player("2",width-width/4,height-height/4);
  //p2 = new Player("2");

  shell1 = new Shell(p1.pos.x,p1.pos.y,4,-3);
  shell2 = new Shell(p1.pos.x,p1.pos.y,4,-3);

}


function draw(){
  background(0);
  p1.update();
  p1.show();

  p2.update();
  p2.show();

  shell1.update(p2);
  shell1.show();

  shell2.update(p1);
  shell2.show();

  if (keyIsPressed == true){
    p1.move(key);
    p2.move(key);
  }

  /*
  push();
  stroke(255);
  line(0,height,width/8,height-width/8);
  line(width,height,width-width/8,height-width/8);
  pop();
  */
}

function keyPressed(){
  if (key == 'a') {
    p1.shoot();
  }
  if (key == 'u') {
    p2.shoot();
  }
}
