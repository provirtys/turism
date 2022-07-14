
let editBtnElems = document.querySelectorAll('.editBtn')
let modals = document.querySelector('.modals')
let modalCloseBtn = document.querySelector(".modal-close-btn")
let form = document.querySelector('form')

form.addEventListener('submit', (e) => {
	e.preventDefault()
})
editBtnElems.forEach(editBtn => {
	editBtn.addEventListener('click', () => {
		let id = editBtn.value
		var data = {
			action: "editKPK_action",
			id: id,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				console.log(response);
				let curKPK = response[0]
				let allKPK = response[1]
				editKPK(curKPK)

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

function editKPK(curKPK) {
	modals.classList.add('active')
	document.body.classList.add('lock');
	console.log(curKPK);
	document.querySelector('#kpkID').value = curKPK['id_kpk']
	document.querySelector('#kpkName').value = curKPK['Name']
	if (curKPK['Head_kpk'] == null) {
		document.querySelector('#kpkHead').value = 'notChosen'
	}
	else {
		document.querySelector('#kpkHead').value = curKPK['Head_kpk']

	}
	document.querySelector('#kpkLvl').value = curKPK['Powers']
	document.querySelector('#dateFrom').value = curKPK['Start_date']
	document.querySelector('#dateTo').value = curKPK['End_date']
	document.querySelector('#kpkEmail').value = curKPK['Email']

}

let saveBtn = document.querySelector('.form__submit')


saveBtn.addEventListener('click', () => {
	let kpkID = document.querySelector('#kpkID').value
	let kpkName = document.querySelector('#kpkName').value
	let kpkHead = document.querySelector('#kpkHead').value
	let kpkLvl = document.querySelector('#kpkLvl').value
	let dateFrom = document.querySelector('#dateFrom').value
	let dateTo = document.querySelector('#dateTo').value
	let kpkEmail = document.querySelector('#kpkEmail').value
	if (kpkID && kpkName && kpkLvl != 'notChosen' && kpkEmail && kpkHead != 'notChosen') {
		var data = {
			action: "saveKPK_action",
			kpkID: kpkID,
			kpkName: kpkName,
			kpkLvl: kpkLvl,
			kpkHead: kpkHead,
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


