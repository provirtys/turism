var submitBtn = $('.form__submit');
var form = $('form');

submitBtn.on('click', function () {
	var subjNameVal = $('input[name=subjName]').val();

	var data = {
		action: "insertSubject_action",
		subjName: subjNameVal,

	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			location.reload()

			// alert('Получено с сервера: ' + response);

			// $('input[name=subjName]').val('');
		});


})

form.submit(function (e) {
	e.preventDefault();
})

