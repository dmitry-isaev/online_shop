/*price range*/
$('#sl2').slider();

/*scroll to top*/
$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
			//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

/**
 * Аккордеон для меню категорий
 */
$('#categories-menu').dcAccordion({
	'speed': 300,
    'disableLink': false
});

/**
 * Добавление товара в корзину
 */
$('.add-to-cart').on('click', function(e) {
	e.preventDefault();

	var id = $(this).data('id');
	var quantity = $('.good-quantity').val();

	$.ajax({
		url: '/cart/add',
		type: 'POST',
		data: {id: id, quantity: quantity},
		success: function(response) {
            cartQuantityShow(response);
		}
	});
});

/**
 * Обновление количества товара
 */
$(':input[type="number"]').on('keyup click', function () {
    var $this = $(this),
        id = $this.data('id'),
		price = parseInt($this.data('price'), 10),
        quantity = parseInt($this.val(), 10) || 1;

    $this.val(quantity > 100 ? 99 : quantity);

    $('#sum-' + id).text(price * quantity);

    recalculateSum();

    $.ajax({
        url: '/cart/update',
        type: 'POST',
        data: {id: id, quantity: quantity},
        success: function(response) {
            cartQuantityShow(response);
        }
    });
});

function recalculateSum() {
    var totalSum = 0;
    $('.product-sum').each(function () {
        totalSum += parseInt($(this).text(), 10);
    });
    $('#total-sum').text(totalSum);
}

/**
 * Удаление товара из корзины
 */
$('.cart_quantity_delete').on('click', function(e) {
   	e.preventDefault();
    var $this = $(this);
    var id = $this.data('id');

    $.ajax({
        url: '/cart/delete',
        type: 'POST',
        data: {id: id},
        success: function(response) {
            cartQuantityShow(response);
            $this.parents('tr').remove();
            recalculateSum();
        }
    });
});

/**
 * Отображение общего количества позиций в корзине
 */
function cartQuantityShow(count) {
    if (parseInt(count, 10)) {
        $('#cart-quantity').html('(' + count + ')');
    } else {
        $('#cart-quantity').html('');
    }
}