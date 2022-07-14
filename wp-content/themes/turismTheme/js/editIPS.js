let addBtn = document.querySelector('.btnAdd')
let tbody = document.querySelector('tbody')
let selectPeople = document.querySelector('#people')
let selectPosition = document.querySelector('#position')
let table = document.querySelector('table')
let userRole = document.querySelector('.userRole').textContent
let rowCnt = 0
let curRowCnt = 0
let formControl = document.querySelector('.form-control')
let ips
addBtn.addEventListener('click', () => {
	formControl.type = 'search'
	table.removeAttribute('hidden')

	let stringBody = ''
	stringBody = `<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>`
	let cloneSelect = selectPeople.cloneNode(true)
	let clonePositionSelect = selectPosition.cloneNode(true)
	tbody.insertAdjacentHTML('beforeend', stringBody)
	let newMember = table.rows[table.rows.length - 1].cells[1]
	let newPosition = table.rows[table.rows.length - 1].cells[3]
	newMember.insertAdjacentElement('beforeend', cloneSelect)
	newPosition.insertAdjacentElement('beforeend', clonePositionSelect)
	cloneSelect.removeAttribute('hidden')
	clonePositionSelect.removeAttribute('hidden')
	rowCnt++
	cloneSelect.addEventListener('change', () => {
		curClonePositionSelect = cloneSelect.closest('tr').querySelector('.addPosition')
		if (cloneSelect.value != 'notChosen') {
			let newDeleteBtnTd = cloneSelect.closest('tr').querySelector('td')
			curTr = cloneSelect.closest('tr')
			curTrTdElems = curTr.querySelectorAll('td')
			selectedOption = cloneSelect.options[cloneSelect.selectedIndex]
			curTrTdElems[2].textContent = selectedOption.dataset.dateofbirth
			curTrTdElems[4].textContent = selectedOption.dataset.telephone
			curTrTdElems[5].textContent = selectedOption.dataset.email

			if (curClonePositionSelect.value != 'notChosen') {
				let id = selectedOption.value
				let pos = curClonePositionSelect.value
				insertStaff(id, pos)
			}
		}
	})

	clonePositionSelect.addEventListener('change', () => {
		curCloneSelect = clonePositionSelect.closest('tr').querySelector('.addMember')
		if (clonePositionSelect.value != 'notChosen' && curCloneSelect.value != 'notChosen') {
			selectedPositionOption = clonePositionSelect.options[clonePositionSelect.selectedIndex]
			let id = curCloneSelect.value
			let pos = selectedPositionOption.value
			insertStaff(id, pos)
		}
	})
})

function insertStaff(id, pos) {
	document.querySelector('html').classList.add('wait')
	data = {
		action: "insertIPS_action",
		id: id,
		pos: pos,
	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			document.querySelector('html').classList.remove('wait')

			curRowCnt++
			if (curRowCnt == rowCnt) {
				location.reload()
			}
		})
}

let deleteBtnElems = document.querySelectorAll('.deleteBtn')
deleteBtnElems.forEach(deleteBtn => {
	deleteBtn.addEventListener('click', () => {
		id = deleteBtn.value
		data = {
			action: "deleteIPS_action",
			id: id,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				location.reload()
			})
	})

});


let modals = document.querySelector('.modals')
let modalCloseBtn = document.querySelector(".modal-close-btn")
let form = document.querySelector('form')
let editBtnElems = document.querySelectorAll('.editBtn')
let id

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
		id: id,
		lastName: lastName,
		firstName: firstName,
		patronymic: patronymic,
		address: address,
		placeOfWork: placeOfWork,
		telephone: telephone,
		email: email,
	}
	console.log(data);
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
		id = editBtn.value
		var data = {
			action: "editPeople_action",
			id: id,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				ips = response
				editPeople(ips);

			},
			"json"
		)
	})
});
function editPeople(ips) {
	modals.classList.add('active')
	document.body.classList.add('lock');
	document.querySelector('#lastName').value = ips['Last_name']
	document.querySelector('#firstName').value = ips['First_name']
	document.querySelector('#patronymic').value = ips['Patronymic']
	document.querySelector('#address').value = ips['Address']
	document.querySelector('#placeOfWork').value = ips['Place_of_work']
	document.querySelector('#telephone').value = ips['Telephone']
	document.querySelector('#email').value = ips['Email']
}

