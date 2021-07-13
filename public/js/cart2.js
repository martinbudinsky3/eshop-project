let lastTransport = null;
let lastPayment = null;
let lastFinalPrice = null;


function transportSelectHandler(newValue, newPrice, originalPrice, finalPrice) {
    let summaryDelivery = document.querySelector('#summary-delivery')
    summaryDelivery.innerHTML = 'Doprava: <span>' + newValue + '</span>'

    if(lastFinalPrice == null) lastFinalPrice = finalPrice
    if(lastTransport == null)  lastTransport = originalPrice

    let summaryPrice = document.querySelector('#summary-price')
    let newFinalPrice = lastFinalPrice - lastTransport + newPrice
    newFinalPrice = Math.round(newFinalPrice * 100) / 100
    summaryPrice.innerHTML = 'CENA SPOLU: <span>' + newFinalPrice + ' €</span>'

    lastTransport = newPrice
    lastFinalPrice = newFinalPrice
}

function paymentSelectHandler(newValue, newPrice, originalPrice, finalPrice) {
    let summaryPay = document.querySelector('#summary-pay')
    summaryPay.innerHTML = 'Platba: <span>' + newValue + '</span>'

    if(lastFinalPrice == null) lastFinalPrice = finalPrice
    if(lastPayment == null)  lastPayment = originalPrice

    let summaryPrice = document.querySelector('#summary-price')
    let price = lastFinalPrice - lastPayment + newPrice
    price = Math.round(price * 100) / 100
    summaryPrice.innerHTML = 'CENA SPOLU: <span>' + price + ' €</span>'

    lastPayment = newPrice
    lastFinalPrice = price
}
