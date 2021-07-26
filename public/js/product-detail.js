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
            var modalSuccess = $('#add-to-cart-modal');
            modalSuccess.find('.modal-body > p').text(data.success);
            modalSuccess.modal('show');
        });

        req.fail(function(error) {
            var modalFail = $('#add-to-cart-modal-fail');
            modalFail.find('.modal-body > p').text(error.error);
            modalFail.modal('show');
        })

        event.preventDefault();
    });
});
