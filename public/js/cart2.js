var lastTransport = null;
var lastPayment = null;
var lastFinalPrice = null;


function transportSelectHandler(newValue, newPrice, originalPrice, finalPrice) {

    let summaryDelivery = document.getElementById('summary-delivery');
    summaryDelivery.innerHTML = 'Doprava: <span>' + newValue + '</span>';

    if(lastFinalPrice == null) lastFinalPrice = finalPrice
    if(lastTransport == null)  lastTransport = originalPrice

    let summaryPrice = document.getElementById('summary-price');
    let price = lastFinalPrice - lastTransport + newPrice;
    price = Math.round(price * 100) / 100;
    summaryPrice.innerHTML = 'CENA SPOLU: <span>' + price + '</span> €';

    lastTransport = newPrice
    lastFinalPrice = price
}


function paymentSelectHandler(newValue, newPrice, originalPrice, finalPrice) {

    let summaryPay = document.getElementById('summary-pay');
    summaryPay.innerHTML = 'Platba: <span>' + newValue + '</span>';

    if(lastFinalPrice == null) lastFinalPrice = finalPrice
    if(lastPayment == null)  lastPayment = originalPrice

    let summaryPrice = document.getElementById('summary-price');
    let price = lastFinalPrice - lastPayment + newPrice;
    price = Math.round(price * 100) / 100;
    summaryPrice.innerHTML = 'CENA SPOLU: <span>' + price + '</span> €';

    lastPayment = newPrice
    lastFinalPrice = price
}