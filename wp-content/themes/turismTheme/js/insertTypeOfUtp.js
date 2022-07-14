var submitBtn = $('.form__submit');
var form = $('form');

submitBtn.on('click', function () {
	var utpNameVal = $('input[name=utpName]').val();

	var data = {
		action: "insertTypeOfUtp_action",
		utpName: utpNameVal,

	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			location.reload()

			// alert('Получено с сервера: ' + response);
		});


})

form.submit(function (e) {
	e.preventDefault();
})

