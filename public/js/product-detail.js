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
        let formData = {
            size: jQuery('select[name=size]').val(),
            color: jQuery('select[name=color]').val(),
            product: jQuery('input[name=product]').val(),
            amount: jQuery('input[name=amount]').val()
        };

        let type = "POST";
        let ajaxurl = '/cart-item';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
        });
    });
});