function Shell(xb,yb,xv,yv){
  this.width = 5;
  this.pos = createVector(xb,yb);
  this.vel = createVector(xv,yv);
  this.acc = createVector(0,0);
  this.touched = false;

  this.applyForce = function(force){
    this.acc.add(force);
  }
  this.applyVel = function(vel){
    this.vel.add(vel);
  }

  this.update = function(enemy){
    this.oldVel = this.vel;
    this.vel.add(this.acc);
    this.pos.add(this.vel);



    if (dist(this.pos.x,this.pos.y,enemy.pos.x,enemy.pos.y) < 20) {
        this.touched = true;

        console.log(" touched: " + enemy.name);
    }

    this.acc.x *= 0.15;

    this.applyForce(createVector(0,0.001));
  }


  this.show = function(){
      push();
      fill(10,230,80);
      translate(this.pos.x,this.pos.y);
      rotate(-HALF_PI);
      rotate(this.vel.heading());
      rectMode(CENTER);
      //rect(0,this.width/2,this.width/2,this.width/2);
      rect(0,0,this.width,this.width*2);
      pop();

  }

}
