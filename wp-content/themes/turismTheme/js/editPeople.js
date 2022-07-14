"use strict";

let table = document.querySelector('table')
let noRows = document.querySelector('.no-rows')
let formControl = document.querySelector('.form-control')


let modals = document.querySelector('.modals')
let modalCloseBtn = document.querySelector(".modal-close-btn")
let form = document.querySelector('form')
let editBtnElems = document.querySelectorAll('.editBtn')
let data
let id_people

form.addEventListener('submit', (e) => {
	e.preventDefault()
	let lastName = document.querySelector('#lastName').value
	let firstName = document.querySelector('#firstName').value
	let patronymic = document.querySelector('#patronymic').value
	let address = document.querySelector('#address').value
	let placeOfWork = document.querySelector('#placeOfWork').value
	let telephone = document.querySelector('#telephone').value
	let email = document.querySelector('#email').value
	data = {
		action: "savePeople_action",
		id: id_people,
		lastName: lastName,
		firstName: firstName,
		patronymic: patronymic,
		address: address,
		placeOfWork: placeOfWork,
		telephone: telephone,
		email: email,
	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			location.reload()
		}
	)
})
modalCloseBtn.addEventListener('click', (e) => {
	modals.classList.remove('active')
	document.body.classList.remove('lock');
});
modals.addEventListener('click', (e) => {
	if (e.target == modals) {
		modals.classList.remove('active')
		document.body.classList.remove('lock');
	}
});

editBtnElems.forEach(editBtn => {
	editBtn.addEventListener('click', () => {
		document.querySelector('html').classList.add('wait')
		id_people = editBtn.closest("td").previousElementSibling.querySelector("button").value;
		data = {
			action: "editPeople_action",
			id_people: id_people,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				document.querySelector('html').classList.remove('wait')
				editPeople(response);
			},
			"json"
		)
	})
});
function editPeople(people) {
	modals.classList.add('active')
	document.body.classList.add('lock');
	document.querySelector('#lastName').value = people['Last_name']
	document.querySelector('#firstName').value = people['First_name']
	document.querySelector('#patronymic').value = people['Patronymic']
	document.querySelector('#address').value = people['Address']
	document.querySelector('#placeOfWork').value = people['Place_of_work']
	document.querySelector('#telephone').value = people['Telephone']
	document.querySelector('#email').value = people['Email']
}

let saveBtn = document.querySelector('.form__submit')