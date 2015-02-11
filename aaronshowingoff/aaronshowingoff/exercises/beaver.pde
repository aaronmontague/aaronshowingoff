void setup(){

	size(400, 400);
	
}

/* @pjs preload="images/cs-ohnoes.png"; */
/* @pjs preload="images/GrassBlock.png"; */
/* @pjs preload="images/Hopper-Happy.png"; */
/* @pjs preload="images/Hopper-Jumping.png"; */
/* @pjs preload="images/Rock.png"; */

/*
var pointCheck = function(){
    stroke(250, 5, 5);
    strokeWeight(5);
    point(this.x + 20, this.y + 30);
    stroke(0, 0, 0);
    strokeWeight(1);
};
*/

// win/lose button
var Button = function(config) {
    this.x = config.x || 0;
    this.y = config.y || 0;
    this.width = config.width || 100;
    this.height = config.height || 25;
    this.bevel = config.bevel || 5;
    this.label = config.label || "Click";
};

Button.prototype.draw = function() {
    fill(0, 234, 255);
    rect(this.x, this.y, this.width, this.height, 5);
    fill(0, 0, 0);
    textSize(19);
    textAlign(LEFT,TOP);
    text(this.label, this.x+5, this.y);
    textAlign(BASELINE);
};
// win/lose button click check
Button.prototype.isMouseInside = function() {
    return mouseX > this.x &&
           mouseX < (this.x + this.width) &&
           mouseY > this.y &&
           mouseY < (this.y + this.height);
};

var btnWin = new Button({
        x: 200,
        y: 250,
        label: "Next Level"
    });
    var btnLose = new Button({
        x: 200,
        y: 250,
        label: "Start Over"
    });
//beaver object
var Beaver = function(x, y) {
    this.x = x;
    this.y = y;
    //this.img = getImage("creatures/Hopper-Happy");
    this.img = loadImage("images/Hopper-Happy.png")
    this.sticks = 0;
    this.bonusSticks = 0;
    this.width = 40;
    this.height = 40;
};

Beaver.prototype.draw = function() {
    fill(255, 0, 0);
    //94 seems to keep Hopper's feet on the ground
    this.y = constrain(this.y, 0, height-94);
    image(this.img, this.x, this.y, 40, 40);
    stroke(250, 5, 5);
    strokeWeight(5);
    //point(this.x, this.y);
    stroke(0, 0, 0);
    strokeWeight(1);
};

Beaver.prototype.hop = function() {
    //this.img = getImage("creatures/Hopper-Happy");
    this.img = loadImage("images/Hopper-Jumping.png")
    this.y -= 5;
};

Beaver.prototype.fall = function() {
    //this.img = getImage("creatures/Hopper-Happy");
    this.img = loadImage("images/Hopper-Happy.png")
    this.y += 5;
};

Beaver.prototype.checkForStickGrab = function(stick,victory) {
    if ((stick.x >= this.x && stick.x <= (this.x + 40)) &&
        (stick.y >= this.y && stick.y <= (this.y + 40))) {
        stick.x = -400;
        this.sticks++;
        if (victory.bonustime === 1){
            this.bonusSticks++;
        }
    }
};
Beaver.prototype.checkForRockHit = function(rock) {
    if ( dist(this.x + this.width/2, 0, rock.x, 0) < this.width/2 + rock.radius && dist(0,this.y+this.height/2, 0, rock.y) < this.height/2 + rock.radius){
        //drop one from the score and remove the negative part of the rock
        if (rock.stillHurts){
            this.sticks--;
            rock.stillHurts = 0;
        }
    }
};
//stick object
var Stick = function(x, y) {
    this.x = x;
    this.y = y;
};

Stick.prototype.draw = function() {
    fill(89, 71, 0);
    rectMode(CENTER);
    rect(this.x, this.y, 5, 40);
    rectMode(CORNER);
};
//enemy object
var Rock = function (x,y){
    this.x = x;
    this.y = y;
    //this.image = getImage("cute/Rock");
    this.image = loadImage("images/Rock.png")
    //make sure rock only takes off one stick
    this.stillHurts = 1;
    this.radius = 16;
};
Rock.prototype.draw = function() {
    fill(102, 98, 102);
    //ellipse(this.x, this.y, this.radius *2, this.radius *1.4);
    image(this.image, this.x-20, this.y-26, 40, 40);
    stroke(250, 5, 5);
    strokeWeight(5);
    //point(this.x, this.y);
    stroke(0, 0, 0);
    strokeWeight(1);
    //fill for scoreboard
    fill(89, 71, 0);
};
//victory object
var Victory = function(hops, hopCycle, finished, bonustime, dance) {
    this.hops = hops;
    this.hopCycle = hopCycle;
    this.finished = finished;
    this.bonustime = bonustime;
    this.dance = dance;
};

Victory.prototype.levelComplete = function(beaver){
    textAlign(CENTER);
    textSize(36);
    text("Level Complete!!", beaver.x, beaver.y - 110);
    textAlign(CORNER);
    btnWin.draw();
};

Victory.prototype.levelFailed = function(beaver){
    beaver.img = getImage("creatures/OhNoes");
    textAlign(CENTER);
    textSize(18);
    text("Level Failed!", beaver.x, beaver.y - 110);
    textAlign(CORNER);
    btnLose.draw();
};

Victory.prototype.gameFinished = function(beaver){
    textAlign(CENTER);
    textSize(36);
    text("You beat the game!!", beaver.x, beaver.y - 110);
    textAlign(CORNER);    
};

// Hopper stays in the middle of the screen (no x axis movement)
var beaver = new Beaver(200, 300);
// fill the level completion arrays
var maxLevel = 4;
var sticksByLevel = [];
var percentByLevel = [];
var rocksByLevel = [];
for (var stb = 0; stb < maxLevel; stb++){
    sticksByLevel[stb] = 40 - stb;
    percentByLevel[stb] = 0.80 + 0.15*(stb/(maxLevel-1));
    rocksByLevel[stb] = random(6,16);
}
if (maxLevel === 1){
    percentByLevel[0] = 0.95;
}
//var sticksByLevel = [1,1,1,1];
//var percentByLevel = [0.80,0.85,0.90,0.95];
//hops at the victory portion of the level
var victory = new Victory(3,20,0,0,0);
var level = 1;
// 1 = keep going, 0 = stop level
var moveState = 1;
// load sticks by level
var sticks = [];
var setSticks = function(){
    sticks = [];
    for (var i = 0; i < sticksByLevel[level-1]; i++) {  
        sticks.push(new Stick(i * 40 + 350, random(20, 260)));
    }
};
setSticks();
// load rocks by level
var rocks = [];
var setRocks = function(){
    rocks = [];
    for (var r = 0; r < rocksByLevel[level-1]; r++) {  
        rocks.push(new Rock(r * 40 + random(400,3600), random(20,309))); //
    }
};
setRocks();
//see if game is finished
var lastLevelComplete = 0;
var grassXs = [];
// width/20 + 20 <-- makes it portable
for (var g = 0; g < width/20 + 20; g++) { 
    grassXs.push(g*20);
}

void draw = function() {
    // static
    //sky
    background(227, 254, 255);
    //ground
    fill(130, 79, 43);
    rectMode(CORNER);
    rect(0, height*0.90, width, height*0.10);
    //cycle the grass
         for (var i = 0; i < grassXs.length; i++) {
            //image(getImage("cute/GrassBlock"), grassXs[i], height*0.85, 20, 20);
            image(loadImage("images/GrassBlock.png"), grassXs[i], height*0.85, 20, 20);
            if (moveState === 1){
                grassXs[i] -= 1;
            }
            if (grassXs[i] <= -20) {
                grassXs[i] = width;
            }
        }
       
    // sticks move across the screen
    var sticksOnScreen = 0;
    for (var i = 0; i < sticks.length; i++) {
        sticks[i].draw();
        beaver.checkForStickGrab(sticks[i],victory);
        if (moveState === 1){
            sticks[i].x -= 1;
        }
        //check to see if any sticks are still on the screen
        if (sticks[i].x > 0){
            sticksOnScreen++;
        }
    }
    //rock movement
    for (var rm = 0; rm < rocks.length; rm++) {
        rocks[rm].draw();
        beaver.checkForRockHit(rocks[rm], victory);
        if (moveState === 1){
            rocks[rm].x -= 3;
        }
    }
    //score and goal by level
    textSize(18);
    text("Level: " + level,20,15);
    text("Score: " + beaver.sticks + "/" + sticksByLevel[level-1], 20, 35);
    text("Goal: " + percentByLevel[level-1]*100 + "%",20,55);
    /*
    text("x Dist: " + dist(beaver.x + beaver.width/2, 0, rocks[0].x, 0), 20, 75);
    text(beaver.width/2 + rocks[1].radius,20,95);
    text("Sticks on Screen: " + sticksOnScreen,20,75);
    text("Bonus Sticks: " + beaver.bonusSticks,20,95);
    text("Move State: " + moveState,20,115);
    text("Victory Dance: " + victory.dance,20,135);
    text("Victory Hops: " + victory.hops,20,155);
    text("sticks.length: " + sticks.length,20,175);
    */
    /* testing out the X postion of the grass items
    for (var i = 0; i < grassXs.length; i++) { 
        text(i + " " + grassXs[i],100,10+10*i);
    } */
    
    //check to see if the goal is already met (bonus time)
    if (beaver.sticks/sticks.length >= percentByLevel[level-1] && moveState === 1) {
        textSize(24);
        fill(255, 0, 0);
        text("Bonus Time", 250, 50);
        victory.bonustime = 1;
    }
    //check to see if level is complete
    if (beaver.sticks/sticks.length >= percentByLevel[level-1]){
        victory.finished = 1;
    }
    
    //hopping
    if (keyIsPressed && keyCode === 0 && moveState === 1) {
        beaver.hop();
    } 
    else if (moveState === 1)
    {
        beaver.fall();
    }
    beaver.draw();
    //stop moving the level
    if (sticksOnScreen === 0){
        moveState = 0;
    }
    //victory dance
    //check to see if Hopper hits the ground with a successful level
    if (beaver.y === height-94 && moveState === 0){
        victory.dance = 1;
    }
    //jump up and down 3 times
    if(victory.dance === 1 && victory.hops > 0){
        if (victory.hopCycle > 0  && victory.finished){
            beaver.hop(); 
            victory.hopCycle--;
        } else if (victory.hopCycle >= -20  && victory.finished){
            beaver.fall();
            victory.hopCycle--;
        } else{
            victory.hopCycle = 20;
            victory.hops--;
        }
    }
    //bring Hopper out of the air
    else if (victory.dance === 0 && moveState === 0){
        beaver.fall();
    }
    //display end of level status
    //moveState tells whether level is running or not
    fill(255, 0, 0);
    if(victory.hops === 0  && victory.finished && level === maxLevel){
        victory.gameFinished(beaver);
        lastLevelComplete = 1;
    }
    else if(victory.hops === 0  && victory.finished){
        victory.levelComplete(beaver);
    }
    else if(victory.hops === 0 && !victory.finished && moveState === 0){
        victory.levelFailed(beaver);
    }
}
// next level or start over
var resetLevel = function(){
    //reset the scoring
    beaver.sticks = 0;
    //reset victory conditions
    victory = new Victory(3,20,0,0,0);
    //refill the stick array
    setSticks();
    setRocks();
    //set it to start
    moveState = 1;
};
mouseClicked = function() {
    //println("x: " + mouseX + " y: " + mouseY);
    //victory.finished needs to be included as well
    //movestate to prevent button from triggering during the level
    //make sure they aren't done with the game
    if (!lastLevelComplete){
       if (btnWin.isMouseInside() && victory.finished === 1 && moveState === 0) {
        //increment level on win
        level += 1;
        resetLevel();
        } 
        else if (btnLose.isMouseInside() && victory.finished === 0 && moveState === 0) {
        resetLevel();
        } 
    }
};