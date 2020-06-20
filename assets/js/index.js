let contentSlider = document.getElementById('allTopSell');
let finish = true;


function slideLeft() {

    if (finish === true) {
        finish = false;
        left = parseInt(getComputedStyle(contentSlider, null).left);
        maxWidth = parseInt(getComputedStyle(contentSlider, null).width);
        if (window.innerWidth <= 1250 && window.innerWidth > 858){
            slideOneScreen = (maxWidth / 24);
        }
        else if (window.innerWidth <= 858){
            slideOneScreen = (maxWidth / 12);
        }
        else{
            slideOneScreen = (maxWidth / 36);
        }
        newLeft = (left + slideOneScreen);
        if (left >= 0){
			left = 0;
            finish = true;
            return;
        }
        else {
            animateLeft(contentSlider, left, newLeft);
        }

    }

}

function animateLeft(obj, fromIndex, to){
    if(fromIndex >= to){
        finish = true;
        return;
    }
    else {
        var box = obj;
        box.style.left = fromIndex + "px";
        setTimeout(function(){
            animateLeft(obj, fromIndex + 5, to);
        }, 1)
    }
}


function slideRight() {

    if (finish === true){
        finish = false;
        left = parseInt(getComputedStyle(contentSlider, null).left);
        maxWidth = parseInt(getComputedStyle(contentSlider, null).width);
        if (window.innerWidth <= 1250 && window.innerWidth > 858){
            slideOneScreen = (maxWidth / 23.97);
            MaxScreen = -(slideOneScreen*9.5)
        }
        else if (window.innerWidth <= 858){
            slideOneScreen = (maxWidth / 11.97);
            MaxScreen = -(slideOneScreen*10.5)
        }
        else{
            slideOneScreen = (maxWidth / 36);
            MaxScreen = -(slideOneScreen*8.5);
        }
        newLeft = (left-slideOneScreen);
        if (left <= MaxScreen){
            finish = true;
            return;
        }
        else {
            animateRight(contentSlider, left, newLeft);
        }

    }
	
}

function animateRight(obj, fromIndex, to){
    if(to >= fromIndex){
        finish = true;
        return;
    }
    else {
        var box = obj;
        box.style.left = fromIndex + "px";
        setTimeout(function(){
            animateRight(obj, fromIndex - 5, to);
        }, 1)
    }
}

function extendText() {
    let textHidden = document.getElementById('textHidden');
    let showAllText = document.getElementById('showAllText');
    if (textHidden.style.display === "none"){
        textHidden.style.display = "contents";
        showAllText.textContent = "Reduire le Texte";
    }
    else{
        textHidden.style.display = "none";
        showAllText.textContent = "[…] En savoir plus";
    }

}

function extendTextCard(element) {
    console.log(element.id);
    let textHidden = document.getElementById('text'+element.id);
    if (textHidden.style.display === "none"){
        textHidden.style.display = "contents";
        element.textContent = "Reduire le Texte";
        element.style.color = "#ffffff"
    }
    else{
        textHidden.style.display = "none";
        element.textContent = "[…] En savoir plus";
        element.style.color = "#FF6801"
    }

}
