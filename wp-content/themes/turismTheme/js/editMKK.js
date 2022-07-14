let editBtnElems = document.querySelectorAll('.editBtn')
let modals = document.querySelector('.modals')
let modalCloseBtn = document.querySelector(".modal-close-btn")
let form = document.querySelector('form')
let userID = document.querySelector('.userID').textContent

form.addEventListener('submit', (e) => {
	e.preventDefault()
})
editBtnElems.forEach(editBtn => {
	editBtn.addEventListener('click', () => {
		let id = editBtn.value
		var data = {
			action: "editMKK_action",
			id: id,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				let curmkk = response[0]

				let allmkk = response[1]
				editmkk(curmkk)

			},
			"json"
		)
	})
});


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
let subjectSelect = document.querySelector('#subject')
let staffSelect = document.querySelector("#modal-staff")
var stringHTML = ""
var currentStaff

function editmkk(curmkk) {
	modals.classList.add('active')
	document.body.classList.add('lock');

	document.querySelector('#mkkID').value = curmkk['id_mkk']
	document.querySelector('#mkkName').value = curmkk['Name']
	if (curmkk['Head_mkk'] == null) {
		document.querySelector('#mkkHead').value = 'notChosen'
	}
	else {
		document.querySelector('#mkkHead').value = curmkk['Head_mkk']

	}
	document.querySelector('#mkkPowers').value = curmkk['Powers']
	document.querySelector('#dateFrom').value = curmkk['Start_date']
	document.querySelector('#dateTo').value = curmkk['End_date']
	document.querySelector('#mkkEmail').value = curmkk['Email']

}

let saveBtn = document.querySelector('.form__submit')


saveBtn.addEventListener('click', () => {
	let mkkID = document.querySelector('#mkkID').value
	let mkkName = document.querySelector('#mkkName').value
	let mkkHead = document.querySelector('#mkkHead').value
	let mkkPowers = document.querySelector('#mkkPowers').value
	let dateFrom = document.querySelector('#dateFrom').value
	let dateTo = document.querySelector('#dateTo').value
	let mkkEmail = document.querySelector('#mkkEmail').value
	if (mkkID && mkkName && mkkPowers != 'notChosen' && mkkEmail && mkkHead != 'notChosen') {
		var data = {
			action: "saveMKK_action",
			mkkID: mkkID,
			mkkName: mkkName,
			mkkPowers: mkkPowers,
			mkkHead: mkkHead,
			dateFrom: dateFrom,
			dateTo: dateTo,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				location.reload()
			}
		)
	}
	else {
		alert('Заполните все поля')
	}
})