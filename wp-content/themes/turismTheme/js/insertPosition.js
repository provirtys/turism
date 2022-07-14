var submitBtn = $('.form__submit');
var form = $('form');

submitBtn.on('click', function () {
	var posNameVal = $('input[name=posName]').val();

	var data = {
		action: "insertPosition_action",
		posName: posNameVal,

	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			location.reload()

			// alert('Получено с сервера: ' + response);
		});

	// $('input[name=posName]').val('');

})

form.submit(function (e) {
	e.preventDefault();
})

