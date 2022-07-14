"use strict"

var submitBtn = $('.form__submit');
var form = $('form');
submitBtn.on('click', function () {
	let people = document.querySelector('#people').value
	let rank = document.querySelector('#rank').value
	let date = document.querySelector('#date').value
	let checkBoxes = document.querySelectorAll('[type=checkbox]:checked')
	let typeValues = []
	checkBoxes.forEach(element => {
		typeValues.push(element.dataset.id)
	});
	let doc  = document.querySelector('#doc').value

	var data = {
		action: "insertRank_action",
		people: people,
		rank: rank,
		types: typeValues,
		date: date,
		doc:doc,

	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			// console.log(response);
			location.reload()

		});
})

form.submit(function (e) {
	e.preventDefault();
})

