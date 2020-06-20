function checkQuantity(element) {
    if (element.value <= 1 || !Number.isInteger(parseFloat(element.value))){
        element.value = 1;
    }else{

    }
}

function changePrice(id) {
    let Price = document.getElementById('price'+id);
    let priceUnity = document.getElementById('priceUnity'+id);
    let quantity = document.getElementById('quantity'+id);
    let totalProducts = document.getElementById('totalProducts');
    let totalHt = document.getElementById('totalHt');
    let totalTva = document.getElementById('totalTva');
    let totalTtc = document.getElementById('totalTtc');
    oldPrice = Price;
    oldTotal = totalProducts.title-oldPrice.title;
    Price.innerText = new Intl.NumberFormat( ).format(priceUnity.title * quantity.value)+'$';
    Price.title = priceUnity.title * quantity.value;
    newTotal = oldTotal+(priceUnity.title * quantity.value);
    totalProducts.title = newTotal;
    totalProducts.innerText = new Intl.NumberFormat( ).format(newTotal)+'$';
    totalHt.innerText = new Intl.NumberFormat( ).format(newTotal)+'$';
    totalTva.innerText = new Intl.NumberFormat( ).format(newTotal*0.20)+'$';
    totalTtc.innerText = new Intl.NumberFormat( ).format((newTotal*0.20)+newTotal)+'$';
}

function oneChoice() {
    let card = document.getElementById('cardPayement');
    let paypal = document.getElementById('paypalPayement');
    if (card.checked === true){
		paypal.checked = false;
	}
}

function oneChoice2() {
    let card = document.getElementById('cardPayement');
    let paypal = document.getElementById('paypalPayement');
    if (paypal.checked === true){
		card.checked = false;
	}
}


