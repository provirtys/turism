var submitBtn = $('.form__submit');
var form = $('form');

submitBtn.on('click', function () {
	var orderNameVal = $('input[name=orderName]').val();

	var data = {
		action: "insertTypeOfOrders_action",
		orderName: orderNameVal,

	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			location.reload()

			// alert('Получено с сервера: ' + response);
		});

	// $('input[name=orderName]').val('');

})

form.submit(function (e) {
	e.preventDefault();
})

