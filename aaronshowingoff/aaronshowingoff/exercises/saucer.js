var xPos = 5;
var yPos = 200;
var buildMove = 0;

var bx = [250, 450, 750, 950, 1250];

var btop = [220, 250, 240, 270, 220];

var lightOn = [40, 240, 540, 740, 1040];

draw = function () {
    background(29, 40, 115);
    fill(255, 242, 0);
    if (xPos <= 200) {
        ellipse(xPos, yPos - 5, 20, 10);
        ellipse(xPos, yPos, 40, 10);
    }
    else {
        ellipse(xPos, yPos + 200 - xPos - 5, 20, 10);
        ellipse(xPos, yPos + 200 - xPos, 40, 10);
    }


    //move the star to the center
    if (xPos < 200) {
        xPos++;
    }
    //start moving the buildings
    if (xPos === 200) {
        buildMove++;
    }

    //fly off the screen
    if (buildMove >= 1200) {
        xPos++;
        buildMove++;
    }

    //move the "background"
    fill(82, 76, 76);
    var z;
    for (z = 0; z <= 4; z++) {
        rect(bx[z] - buildMove, btop[z], 150, 300);
    }

    //windows
    fill(0, 0, 0);
    var i;
    var j;
    var k;
    for (i = 10; i <= 110; i += 50) {
        for (j = 10; j <= 260; j += 50) {
            for (k = 0; k <= 4; k++) {
                if (j === 10 && buildMove >= lightOn[k] && buildMove <= lightOn[k] + 170 && k === k) {
                    fill(255, 242, 0);
                    rect(bx[k] + i - buildMove, btop[k] + j, 30, 40);
                    fill(0, 0, 0);
                } else {
                    rect(bx[k] + i - buildMove, btop[k] + j, 30, 40);
                }
            }

        }
    }

};