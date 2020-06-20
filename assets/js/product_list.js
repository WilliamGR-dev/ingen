let inputLeft = document.getElementById('inputLeftPrice');
let inputRight = document.getElementById('inputRightPrice');
let thumbLeft = document.querySelector('.sliderPrice > .thumbPrice.leftPrice');
let thumbRight = document.querySelector('.sliderPrice > .thumbPrice.rightPrice');
let range = document.querySelector('.sliderPrice>.rangePrice');
let minPrice = document.getElementById('minPrice');
let maxPrice = document.getElementById('maxPrice');

let inputLeftLand = document.getElementById('inputLeftLand');
let inputRightLand = document.getElementById('inputRightLand');
let thumbLeftLand = document.querySelector('.sliderLand > .thumbLand.leftLand');
let thumbRightLand = document.querySelector('.sliderLand > .thumbLand.rightLand');
let rangeLand = document.querySelector('.sliderLand>.rangeLand');
let minLand = document.getElementById('minLand');
let maxLand = document.getElementById('maxLand');

function changeThumbLeftLand() {
    maxValue = Math.ceil(parseInt(maxPriceLand.value));
    minValue = Math.ceil(parseInt(minPriceLand.value));
    if (0<=minValue && minValue<=17857 && maxValue>minValue){
        thumbLeftLand.style.left = ((minValue/17857)*100) + "%";
        rangeLand.style.left = ((minValue/17857)*100) + "%";
    }
}
function changeThumbRightLand() {
    maxValue = Math.ceil(parseInt(maxLand.value));
    minValue = Math.ceil(parseInt(minLand.value));
    if (0<=maxValue && maxValue<=17857 && maxValue>minValue){
        thumbRightLand.style.right = Math.abs(((maxValue/17857)*100)-100) + "%";
        rangeLand.style.right = Math.abs(((maxValue/17857)*100)-100) + "%";
    }
}
function setLeftValueLand() {
    let _this = inputLeftLand,
        min = parseInt(_this.min),
        max = parseInt(_this.max);

    _this.value = Math.min(parseInt(_this.value), parseInt(inputRightLand.value) - 1);

    let percent = ((_this.value - min)/ (max - min)) * 100;

    minLand.value = Math.ceil((17857*percent)/100);
    thumbLeftLand.style.left = percent + "%";
    rangeLand.style.left = percent + "%";
}
function setRightValueLand() {
    let _this = inputRightLand,
        min = parseInt(_this.min),
        max = parseInt(_this.max);

    _this.value = Math.max(parseInt(_this.value), parseInt(inputLeftLand.value) + 1);

    let percent = ((_this.value - min)/ (max - min)) * 100;

    maxLand.value = Math.ceil((17857*percent)/100);
    thumbRightLand.style.right = (100-percent) + "%";
    rangeLand.style.right = (100-percent) + "%";
}
setRightValueLand();
setLeftValueLand();

inputLeftLand.addEventListener("input", setLeftValueLand);
inputRightLand.addEventListener("input", setRightValueLand);

function changeThumbLeftPrice() {
    maxValue = Math.ceil(parseInt(maxPrice.value));
    minValue = Math.ceil(parseInt(minPrice.value));
    if (0<=minValue && minValue<=2710000 && maxValue>minValue){
        thumbLeft.style.left = ((minValue/2710000)*100) + "%";
        range.style.left = ((minValue/2710000)*100) + "%";
    }
}
function changeThumbRightPrice() {
    maxValue = Math.ceil(parseInt(maxPrice.value));
    minValue = Math.ceil(parseInt(minPrice.value));
    if (0<=maxValue && maxValue<=2710000 && maxValue>minValue){
        thumbRight.style.right = Math.abs(((maxValue/2710000)*100)-100) + "%";
        range.style.right = Math.abs(((maxValue/2710000)*100)-100) + "%";
        console.log(Math.abs((maxValue/2710000)*100));
    }
}
function setLeftValue() {
    let _this = inputLeft,
        min = parseInt(_this.min),
        max = parseInt(_this.max);

    _this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 1);

    let percent = ((_this.value - min)/ (max - min)) * 100;

    minPrice.value = Math.ceil((2710000*percent)/100);
    thumbLeft.style.left = percent + "%";
    range.style.left = percent + "%";
}
function setRightValue() {
    let _this = inputRight,
        min = parseInt(_this.min),
        max = parseInt(_this.max);

    _this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 1);

    let percent = ((_this.value - min)/ (max - min)) * 100;

    maxPrice.value = Math.ceil((2710000*percent)/100);
    thumbRight.style.right = (100-percent) + "%";
    range.style.right = (100-percent) + "%";
}
setRightValue();
setLeftValue();

inputLeft.addEventListener("input", setLeftValue);
inputRight.addEventListener("input", setRightValue);

function updateFilter($element) {

    url = window.location.href;
    newelement = '&' + $element.firstChild.title +'=1';
    check = url.includes(newelement) ? true : false;
    if (check){
        newurl = url.replace(newelement,'');
        window.open(newurl,'_self');
    }
    else{
        newurl = url + newelement;
        window.open(newurl,'_self');
    }
}



function orderProduct($element) {

    url = window.location.href;
    parameters = ['pricedesc','priceasc', 'alphabetique', 'rating', 'socialgroup'];
    newelement = '&order=' + $element.title;
    change = false;
    parameters.forEach((parameter) => {
        check = url.includes('&order='+parameter) ? true : false;
        if (check===true){
            deleteurl = url.replace(('&order='+parameter),'');
            newurl = deleteurl + newelement;
            window.open(newurl, '_self');
            change = true;
        }
    });
    if (change===false){
        newurl = url + newelement;
        window.open(newurl, '_self');
    }
}

function updatePrice($pMin=null,$pMax=null) {

    if($pMin != null && $pMax != null){
        url = window.location.href;
        newelementPMin = '&pmin=' + minPrice.value;
        newelementPMax = '&pmax=' + maxPrice.value;
        checkPMin = url.includes('&pmin='+$pMin) ? true : false;
        checkPMax = url.includes('&pmax='+$pMax) ? true : false;
        if (checkPMin || checkPMax){
            deleteurl = url.replace(('&pmin='+$pMin),'');
            url = deleteurl;
            deleteurl = url.replace(('&pmax='+$pMax),'');
            url = deleteurl;
            newurl = url + newelementPMin + newelementPMax;
            window.open(newurl, '_self');
        }
    }
    else {
        url = window.location.href;
        newelementPMin = '&pmin=' + minPrice.value;
        newelementPMax = '&pmax=' + maxPrice.value;
        checkPMin = url.includes('&pmin=') ? true : false;
        checkPMax = url.includes('&pmax=') ? true : false;
        if (checkPMin || checkPMax){

        }
        else{
            newurl = url + newelementPMin + newelementPMax;
            window.open(newurl, '_self');
        }
    }


}

function updateArea($areaMin=null,$areaMax=null) {

    if($areaMin != null && $areaMax != null){
        url = window.location.href;
        newelementAMin = '&areaMin=' + minLand.value;
        newelementAMax = '&areamax=' + maxLand.value;
        checkAMin = url.includes('&areaMin='+$areaMin) ? true : false;
        checkAMax = url.includes('&areamax='+$areaMax) ? true : false;
        if (checkAMin || checkAMax){
            deleteurl = url.replace(('&areaMin='+$areaMin),'');
            url = deleteurl;
            deleteurl = url.replace(('&areamax='+$areaMax),'');
            url = deleteurl;
            newurl = url + newelementAMin + newelementAMax;
            window.open(newurl, '_self');
        }
    }
    else {
        url = window.location.href;
        newelementAMin = '&areamin=' + minLand.value;
        newelementAMax = '&areamax=' + maxLand.value;
        checkAMin = url.includes('&areamin=') ? true : false;
        checkAMax = url.includes('&areamax=') ? true : false;
        if (checkAMin || checkAMax){

        }
        else{
            newurl = url + newelementAMin + newelementAMax;
            window.open(newurl, '_self');
        }
    }


}
