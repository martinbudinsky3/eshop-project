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

function formSubmitPrevent(event) {
    event.preventDefault();
}