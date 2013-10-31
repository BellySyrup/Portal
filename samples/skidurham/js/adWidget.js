var direction;
var wDiv; // widgetContainer
var aDiv; // ad
var mySlideInterval;
var myFadeInterval;
var myImageInterval;
var myImageFadeInterval;
var speed = 50;
var currentWidth;
var IE = /*@cc_on!@*/false;
var incr = 0.1;

var imageArray = new Array(3);
imageArray[0] = "./images/ad1.jpg";
imageArray[1] = "./images/ad2.jpg";
imageArray[2] = "./images/ad3.jpg";
var imageRef = imageArray.length - 1;


function toggleAdButton(obj, imgRef) {
	if (wDiv.style.width == "80px" && imgRef == 1) {
		obj.style.backgroundImage = "url('./images/arrowLWhite.png')";
	} else if (wDiv.style.width == "80px" && imgRef == 2) {
		obj.style.backgroundImage = "url('./images/arrowLBlue.png')";
	} else if (wDiv.style.width == "450px" && imgRef == 1) {
		obj.style.backgroundImage = "url('./images/arrowRWhite.png')";
	} else if (wDiv.style.width == "450px" && imgRef == 2) {
		obj.style.backgroundImage = "url('./images/arrowRBlue.png')";
	}
}


function toggleAdWidget(check) {
	// clear any present intervals
	clearInterval(mySlideInterval);
	clearInterval(myFadeInterval);
	clearInterval(myImageInterval);
	clearInterval(myImageFadeInterval);
	
	
	// first load, set variables and style properties so they can be accessed later
	if (check) {
		wDiv = document.getElementById('adWidget');
		aDiv = document.getElementById('ad');
		wDiv.style.width = "450px";
		
		if (IE) {
			aDiv.style.filter = "alpha(opacity=100)";
		} else {
			aDiv.style.opacity = 1;
		}
		
		myImageInterval = setInterval("rotateAds()", 6000);
	}
	
	// user-clicked
	else {
		currentWidth = getWidth(wDiv);
		direction = getDirection(currentWidth);
		mySlideInterval = setInterval("slideAd('" + direction + "')", speed);	
	}
}

function slideAd(dir) {
	if (dir == "left") {
		
		if (getWidth(wDiv) != 450) {
			wDiv.style.width = getWidth(wDiv) + Math.ceil((450 - getWidth(wDiv)) / 4) + "px";
		} else {
			myImageInterval = setInterval("rotateAds()", 6000);
			document.getElementById('widgetBtn').style.backgroundImage = "url('./images/arrowRWhite.png')";
			opValue = 0;
			myFadeInterval = setInterval("fadeOpacity('in','false')", speed);
			clearInterval(mySlideInterval);
		}
	}
	
	else {	
		if (IE) {
			aDiv.style.filter = 'alpha(opacity=0)';
		} else {
			aDiv.style.opacity = 0;
		}
		
		if (getWidth(wDiv) != 80) {
			wDiv.style.width = getWidth(wDiv) - Math.ceil((getWidth(wDiv) - 80) / 4) + "px";
		} else {
			document.getElementById('widgetBtn').style.backgroundImage = "url('./images/arrowLWhite.png')";
			//opValue = 1;
			//myFadeInterval = setInterval("fadeOpacity('out')", speed);
			clearInterval(mySlideInterval);
		}
		
	}
}

function getDirection(w) {
	if (w < 450) {
		return "left";
	} else if (w > 80) {
		return "right";
	}
}

function getWidth(obj) {
	// returns width as an int
	return parseInt(obj.style.width.replace(/px/, ""));
}

function fadeOpacity(mode, images) {
	if (mode == "in") {
		if (opValue < 1) {
			opValue = opValue + incr;
		
			if (IE) {
				aDiv.style.filter = 'alpha(opacity=' + opValue*100 + ')';
			} else {
				aDiv.style.opacity = opValue;
			}
		} else {
			if (images) {
				performImageSwitch();
			}
			clearInterval(myFadeInterval);
		}
	} else {
		if (opValue > 0) {
			opValue = opValue - incr;
			
			if (IE) {
				aDiv.style.filter = 'alpha(opacity=' + opValue*100 + ')';
			} else {
				aDiv.style.opacity = opValue;
			}
		} else {
			if (images) {
				performImageSwitch();
			}
			clearInterval(myFadeInterval);
		}
	
	}
}

function rotateAds() {
	clearInterval(myImageFadeInterval);
	
	opValue = 1;
	myImageFadeInterval = setInterval("fadeOpacity('out','true')", 50);
}

function performImageSwitch() {
	clearInterval(myImageFadeInterval);
	
	if (imageRef == imageArray.length - 1) {
		imageRef = 0;
	} else {
		imageRef++;
	}
	
	document.getElementById('adImage').src = imageArray[imageRef];
	
	myImageFadeInterval = setInterval("fadeOpacity('in',false)", 50);
	
}
