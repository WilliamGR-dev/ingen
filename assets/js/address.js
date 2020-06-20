let buttonAddAddress = document.getElementById('addAddress');
let buttonAddAddressPayement = document.getElementById('addAddressPayement');
let buttonModifyAddress = document.getElementById('modifyAddress');
let buttonModifyAddressPayement = document.getElementById('modifyAddressPayement');
let infoAddAddress = document.getElementById('infoAddAddress');

buttonAddAddressPayement.addEventListener('click', () => infoAddAddress.showModal());
document.addEventListener('click', ({target}) => target === infoAddAddress && infoAddAddress.close());

buttonModifyAddressPayement.addEventListener('click', () => infoAddAddress.showModal());
document.addEventListener('click', ({target}) => target === infoAddAddress && infoAddAddress.close());

buttonModifyAddress.addEventListener('click', () => infoAddAddress.showModal());
document.addEventListener('click', ({target}) => target === infoAddAddress && infoAddAddress.close());

buttonAddAddress.addEventListener('click', () => infoAddAddress.showModal());
document.addEventListener('click', ({target}) => target === infoAddAddress && infoAddAddress.close());