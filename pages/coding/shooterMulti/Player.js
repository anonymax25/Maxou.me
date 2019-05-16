function Player(name,x,y){
  this.name = name;
  this.width = 20;
  this.pos = createVector(x,y-this.width/2);
  this.vel = createVector(0,0);
  this.dir = 1;
  if (this.name == "1") {
    this.angle = 0;
  } else {
    this.angle = 180;
  }
  this.showShell = false;
  this.power = 6;
  this.points = 0;

  this.applyVel = function(vel){
    this.vel.add(vel);
  }

  this.update = function(){

    if (this.showShell) {
      this.shell.update;
    }

    this.pos.add(this.vel);

    this.vel.x *= 0.70;

    if (this.vel.x > 0) {
      dir = 1;
    } else {
      dir = -1;
    }

    if (this.name == "1") {
      //console.log(shell1.touched);
      if (shell1.touched == true) {
        shell1.touched = false;
        this.points++;

      }
    } else {
      //console.log(shell2.touched);
      if (shell2.touched == true) {
        shell2.touched = false;
        this.points++;
      }
    }


    //this.applyForce(createVector(0,0.001));
    //this.acc.mult(0);
    //console.log("vel " + this.vel.x);
    //console.log(this.angle);
  }

  this.show = function(){
      push();
      noStroke();
      fill(255);
      if (this.name == "1") {
        text("Points player: " + this.name + " = " + this.points, 30, 30);
      } else {
        text("Points player: " + this.name + " = " + this.points, width-30*4 -10, 30);
      }
      pop();
      if (this.showShell) {
        this.shell.show();
      }
      push();

      translate(this.pos.x + this.width/2,this.pos.y);
      rotate(-HALF_PI);
      //rotate(this.vel.heading());
      rectMode();
      angleMode(DEGREES);

      rotate(this.angle);


        rect(0,0,5,50);


      angleMode(RADIANS);
      pop();

      push();
      fill(130,230,80);
      translate(this.pos.x,this.pos.y);
      rotate(-HALF_PI);
      //rotate(this.vel.heading());
      rectMode(CENTER);
      //console.log("pi/2 " + sin(HALF_PI));



      fill(130,230,80);
      rect(0,this.width/2,this.width/2,this.width*2);
      rect(0,-this.width/2,this.width/2,this.width*2);

      rect(0,0,this.width,this.width);

      fill(80,180,50);
      rect(this.width/4 + this.width/6,0,this.width/4,this.width);
      rect(this.width/4,0,this.width/4,this.width*1.5);
      fill(200);
      ellipse(-this.width/3,-this.width,this.width/2,this.width/2);
      ellipse(-this.width/3,-this.width/2,this.width/2,this.width/2);
      ellipse(-this.width/3,0,this.width/2,this.width/2);
      ellipse(-this.width/3,this.width/2,this.width/2,this.width/2);
      ellipse(-this.width/3,this.width,this.width/2,this.width/2);

      ellipse(-this.width/10,this.width*1.4,this.width/2,this.width/2);
      ellipse(-this.width/10,this.width*(-1.4),this.width/2,this.width/2);
      stroke(160);
      strokeWeight(2);
      line(-this.width/10,this.width*1.1,-this.width/10,this.width*(-1.1));
      strokeWeight(2);
      line(this.width/10,this.width*1.5,this.width/10,this.width*(-1.5));

      stroke(255);
      strokeWeight(3);
      fill(255);

      angleMode(DEGREES);

      angleMode(RADIANS);
            /*
        if (this.dir > 0) {
        } else {
            line(this.width/2, 0,this.width/2,this.width);
        }
        */
      pop();

  }

  this.move = function(keyChar){
    if (this.name == "1") {
      switch (keyChar) {
        case "d":
          this.vel.add(createVector(1,0));
          break;
        case "q":
          this.vel.sub(createVector(1,0));
          break;
        case "z":
          this.angle+=1;
          break;
        case "s":
          this.angle-=1;
          break;

        default:

      }
    } else if(this.name == "2"){
      switch (keyChar) {
        case "l":
          this.vel.add(createVector(1,0));
          break;
        case "j":
          this.vel.sub(createVector(1,0));
          break;
        case "i":
          this.angle++;
          break;
        case "k":
          this.angle--;
          break;

        default:

      }
    }

  }

  this.shoot = function(){
    angleMode(DEGREES);
    if (this.name == "1") {
      shell1 = new Shell(this.pos.x + this.width/2,this.pos.y,this.power*cos(this.angle),this.power*sin(this.angle));
    } else if(this.name == "2"){
      shell2 = new Shell(this.pos.x + this.width/2,this.pos.y,this.power*cos(this.angle),this.power*sin(this.angle));
    }
    angleMode(RADIANS);
    console.log("shoot " + this.name);

  }
}
