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

// add product to cart via ajax
$(function(){

    // CREATE
    $("#add-to-cart").on('click', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('input[name="_token"]').val()
            }
        });

        e.preventDefault();
        var formData = {
            size: jQuery('select[name=size]').val(),
            color: jQuery('select[name=color]').val(),
            product: jQuery('input[name=product]').val(),
            amount: jQuery('input[name=amount]').val()
        };

        var type = "POST";
        var ajaxurl = '/cart-item';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
        });
    });
});