// functions for increment and decrement buttons that change value in numeric input

function incrementNumberValue(incButton,item_price) {
    let input = incButton.previousElementSibling
    input.value++
    let p = document.getElementById('summary-price');
    price = input.value*item_price;
    price =  Math.round(price * 100) / 100;
    p.innerHTML ='<span>CENA SPOLU: </span> ' +  price;
}

function decrementNumberValue(decButton,item_price) {
    let input = decButton.nextElementSibling

    if(input.value != 1) {
        input.value--
    }
    let p = document.getElementById('summary-price');
    price = input.value*item_price;
    price =  Math.round(price * 100) / 100;
    p.innerHTML ='<span>CENA SPOLU: </span> ' +  price;
}
