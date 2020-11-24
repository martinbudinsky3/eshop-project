// functions for increment and decrement buttons that change value in numeric input

function incrementNumberValue(incButton) {
    let input = incButton.previousElementSibling
    input.value++
}

function decrementNumberValue(decButton) {
    let input = decButton.nextElementSibling

    if(input.value != 1) {
        input.value--
    }
}

function showProductInColor(colorSelector) {
    let colorValue = colorSelector.value
    let url = new URL(window.location.href);
    url.searchParams.set('color', colorValue);
    window.location.href = url;
}

