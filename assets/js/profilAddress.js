let buttonAddAddress = document.getElementById('addAddress');
let buttonModifyAddress = document.getElementById('modifyAddress');
let infoAddAddress = document.getElementById('infoAddAddress');
let infoModifyAddress = document.getElementById('infoModifyAddress');
let allAddress = document.getElementById('allAddress');
let allAddressBill = document.getElementById('allAddressBill');
let displayAddress = document.getElementById('displayAddress');
let displayAddressBill = document.getElementById('displayAddressBill');
let inputDelivery = document.getElementById('addressDelivery');
let inputBill = document.getElementById('addressBill');
let displayBilling = document.getElementById('displayBilling');

function selectChild() {
    let child = allAddress.children;
    let childBill = allAddressBill.children;
    child['0'].setAttribute('selected', "selected");
    childBill['0'].setAttribute('selected', "selected");
}
function selectAddress(){
    let strUser = allAddress.options[allAddress.selectedIndex].text;
    test = strUser.replace(',', '<br>');
    test = test.replace(',', '<br>');
    displayAddress.innerHTML = test;
    inputDelivery.value = allAddress.value;
}
function selectAddressBill(){
    let strUser = allAddressBill.options[allAddressBill.selectedIndex].text;
    test = strUser.replace(',', '<br>');
    test = test.replace(',', '<br>');
    displayAddressBill.innerHTML = test;
    if (displayBilling.checked === true){
        inputBill.value = allAddressBill.value;
    }
    else {
        inputBill.value = null;
    }
}

function openModalModify(){
    infoModifyAddress.showModal();
    document.addEventListener('click', ({target}) => target === infoModifyAddress && infoModifyAddress.close());
}


buttonAddAddress.addEventListener('click', () => infoAddAddress.showModal());
document.addEventListener('click', ({target}) => target === infoAddAddress && infoAddAddress.close());

function openModalAdd(){
    infoAddAddress.showModal();
    document.addEventListener('click', ({target}) => target === infoAddAddress && infoAddAddress.close());
}

