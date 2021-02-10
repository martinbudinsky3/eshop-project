function showProductInColor(colorSelector) {
    let colorValue = colorSelector.value
    let url = new URL(window.location.href);
    url.searchParams.set('color', colorValue);
    window.location.href = url;
}

// add product to cart via ajax
$(function(){

    var form = $('#product-input');

    form.on('submit', function(event) {
        var req = $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize()
        });

        req.done(function(data) {
            console.log( data );
            $('#add-to-cart-modal').modal('show');
        });

        req.fail(function(error) {
            console.log(error);
            $('#add-to-cart-modal-fail').modal('show');
        })

        event.preventDefault();
    });
});