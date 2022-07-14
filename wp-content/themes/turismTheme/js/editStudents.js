let addBtn = document.querySelector('.btnAdd')
let tbody = document.querySelector('tbody')
let selectPeople = document.querySelector('#people')
let table = document.querySelector('table')
let userRole = document.querySelector('.userRole').textContent
let rowCnt = 0
let curRowCnt = 0
let formControl = document.querySelector('.form-control')
let student
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
	<td></td>
	<td></td>

</tr>`
	let cloneSelect = selectPeople.cloneNode(true)
	tbody.insertAdjacentHTML('beforeend', stringBody)
	let newMember = table.rows[table.rows.length - 1].cells[1]
	newMember.insertAdjacentElement('beforeend', cloneSelect)
	cloneSelect.removeAttribute('hidden')
	rowCnt++
	cloneSelect.addEventListener('focus',()=>{
		cloneSelect.style.textAlign = "left"
	})
	cloneSelect.addEventListener('blur',()=>{
		cloneSelect.style.textAlign = "center"
	})
	cloneSelect.addEventListener('change', () => {
		if (cloneSelect.value != 'notChosen') {
			let newDeleteBtnTd = cloneSelect.closest('tr').querySelector('td')
			curTr = cloneSelect.closest('tr')
			curTrTdElems = curTr.querySelectorAll('td')
			selectedOption = cloneSelect.options[cloneSelect.selectedIndex]
			curTrTdElems[2].textContent = selectedOption.dataset.gender
			curTrTdElems[3].textContent = selectedOption.dataset.dateofbirth
			curTrTdElems[4].textContent = selectedOption.dataset.address
			curTrTdElems[5].textContent = selectedOption.dataset.placeofwork
			curTrTdElems[6].textContent = selectedOption.dataset.telephone
			curTrTdElems[7].textContent = selectedOption.dataset.email
			let id = selectedOption.value
			data = {
				action: "insertStudent_action",
				id: id,
			}
			jQuery.post(
				myajaxurl.ajaxurl,
				data,
				function (response) {
					curRowCnt++
					if (curRowCnt == rowCnt) {
						location.reload()
					}
				})
		}
	})
})

let deleteBtnElems = document.querySelectorAll('.deleteBtn')
deleteBtnElems.forEach(deleteBtn => {
	deleteBtn.addEventListener('click', () => {
		id = deleteBtn.value
		data = {
			action: "deleteStudent_action",
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
	if (lastName && firstName && patronymic && address && placeOfWork && telephone && email) {
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
				student = response
				editStudent(student);

			},
			"json"
		)
	})
});
function editStudent(student) {
	modals.classList.add('active')
	document.body.classList.add('lock');
	document.querySelector('#lastName').value = student['Last_name']
	document.querySelector('#firstName').value = student['First_name']
	document.querySelector('#patronymic').value = student['Patronymic']
	document.querySelector('#address').value = student['Address']
	document.querySelector('#placeOfWork').value = student['Place_of_work']
	document.querySelector('#telephone').value = student['Telephone']
	document.querySelector('#email').value = student['Email']
}

let saveBtn = document.querySelector('.form__submit')

