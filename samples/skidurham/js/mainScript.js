var IE = /*@cc_on!@*/false;

function erase(elem) {
	if (IE) {
		elem.value = "";
	} else {
		elem.value = "";
	}
}

function buttonSwap (obj, image) {
	obj.src = "./images/" + image;
}

function imgBorder(obj, style) {
	obj.style.border = style;
}