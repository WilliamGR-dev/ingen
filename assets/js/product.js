let infoAddProduct = document.getElementById('infoAddProduct');
let imageSelected = document.getElementById('imageSelected');
let textHidden = document.getElementById('textHidden');
let showAllText = document.getElementById('showAllText');
let nameProduct = document.getElementById('productName');



function addProduct(){
    infoAddProduct.showModal();
    document.addEventListener('click', ({target}) => target === infoAddProduct && infoAddProduct.close());
}

function changeImage(x) {
    newImg = x.src;
    newImg;
    imageSelected.src = newImg;
}
function changeImageColor() {
    let x = document.getElementById("color").selectedIndex;
    let y = document.getElementById("color").options;
    src = './assets/img/products/'+ nameProduct.innerText +'/skin/'+ y[x].title +'.png';
    imageSelected.src = src;
}
function checkQuantity(element) {
    if (element.value <= 1 || !Number.isInteger(parseFloat(element.value))){
        element.value = 1;
    }else{

    }

}
function extendText() {
    if (textHidden.style.display === "none"){
        textHidden.style.display = "contents";
        showAllText.textContent = "Reduire le Texte";
    }
    else{
        textHidden.style.display = "none";
        showAllText.textContent = "[…] Lire la suite";
    }

}

