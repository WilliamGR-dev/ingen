function myFunction(element){
    if (element.checked === true){
        let input = document.getElementById(element.title);
        input.style.display = "block";
    }
    else {
        let input = document.getElementById(element.title);
        input.style.display = "none";
    }
}

function displayInputImg(element){
   let oldElement = document.querySelector(".divDisplay");
   if (oldElement !== null) {oldElement.className="divHidden";}
   document.getElementById("div" + element.value).className = "divDisplay";

}
