var submitBtn = $('.form__submit');
var form = $('form');
let ipsArr = []

submitBtn.on('click', function () {
	let schoolName = document.querySelector('#schoolName').value
	let schoolType = document.querySelector('#schoolType').value
	let dateFrom = document.querySelector('#dateFrom').value
	let dateTo = document.querySelector('#dateTo').value
	let directorSchool = document.querySelector('#directorSchool').value
	let typeTurism = document.querySelector('#typeTurism').value
	let directorEducation
	// if (departCnt.value > 3) {
	// 	directorEducation = document.querySelector('#directorEducation').value
	// }
	// else {
	// 	directorEducation = null
	// }

	let email = document.querySelector('#email').value

	//Чекбоксы стажеров
	let internArr = []
	let checkBoxElems = document.querySelectorAll('.tableCheckBox')
	checkBoxElems.forEach((checkBox, i) => {
		if (checkBox.checked) {
			internArr.push(1)
		}
		else {
			internArr.push(0)

		}
	});

	if (typeTurism != 'notChosen' && schoolName && schoolType != 'notChosen' && dateFrom && dateTo && directorSchool != 'notChosen' && directorEducation != 'notChosen' && email) {
		document.querySelector('html').classList.add('wait')
		if (schoolType == 1) {
			typeTurism = 0
		}
		var data = {
			action: "insertSchool_action",
			schoolName: schoolName,
			schoolType: schoolType,
			dateFrom: dateFrom,
			dateTo: dateTo,
			directorSchool: directorSchool,
			directorEducation: directorEducation,
			email: email,
			typeTurism: typeTurism,
			ips: ipsArr,
			intern: internArr,
		}

		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				document.querySelector('html').classList.remove('wait')
				if (response == 0) {
					alert("Введенный email уже используется")
				}
				else if (response == 1) {
					alert('Данные от аккунта школы отправлены на введенный email')
					location.reload()

				}
			});
	} else {

		alert("Заполните все поля")
	}

})

form.submit(function (e) {
	e.preventDefault();
})

let schoolTypeSelect = document.querySelector('#schoolType')
let mkkPowers = document.querySelector('#mkkPowers').textContent
schoolTypeSelect.addEventListener('change', () => {
	if (schoolTypeSelect.value != 'notChosen') {
		let typeTurism = document.querySelector('#typeTurism')
		if (schoolTypeSelect.value == 1) {
			typeTurism.setAttribute('disabled', '')
		}
		else{
			typeTurism.removeAttribute('disabled')
		}
		let selectOptionsStr = ''
		let schoolType = schoolTypeSelect.value

		let selectTypeClone = document.querySelector('#typeTurismSource').cloneNode(true)
		selectTypeClone.removeAttribute('hidden')
		let arrTypesToDelete = []
		for (let i = 0; i < selectTypeClone.length; i++) {
			if (mkkPowers[i] < schoolType) {
				arrTypesToDelete.push(i)
			}
		}
		arrTypesToDelete.reverse()
		arrTypesToDelete.forEach(element => {
			selectTypeClone.remove(element);
		});
		typeTurism.innerHTML = selectTypeClone.innerHTML
		typeTurism.value = 1

	}
	else {
		typeTurism.innerHTML = ''
		let option = document.createElement('option')
		option.value = 'notChosen'
		option.innerHTML = '-Выберите уровень школы-'
		typeTurism.appendChild(option)
	}
})

////Отображение поля завуча
// let departCnt = document.querySelector('#departCnt')
// let directorEducationRow = document.querySelector('.directorEducationRow')
// departCnt.addEventListener('input', () => {
// 	if (departCnt.value > 3) {
// 		directorEducationRow.removeAttribute('hidden')
// 	}
// 	else {
// 		directorEducationRow.setAttribute('hidden', '')
// 	}
// })

let addBtn = document.querySelector('.btnAdd')
let tbody = document.querySelector('tbody')
let selectPeople = document.querySelector('#people')
let table = document.querySelector('table')
let userRole = document.querySelector('.userRole').textContent
let rowCnt = 0
let curRowCnt = 0
let ips
let deleteBtnSrc = document.querySelector('.deleteBtnSrc')
addBtn.addEventListener('click', () => {
	table.removeAttribute('hidden')

	let stringBody = ''
	stringBody = `<tr>
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
	cloneSelect.addEventListener('change', () => {
		if (cloneSelect.value != 'notChosen') {
			let newDeleteBtnTd = cloneSelect.closest('tr').querySelector('td')
			let newDeleteBtn = deleteBtnSrc.cloneNode(true)
			newDeleteBtn.removeAttribute('hidden')
			newDeleteBtn.classList.remove('deleteBtnSrc')
			curTr = cloneSelect.closest('tr')
			curTrTdElems = curTr.querySelectorAll('td')
			selectedOption = cloneSelect.options[cloneSelect.selectedIndex]
			curTrTdElems[2].textContent = selectedOption.dataset.dateofbirth
			curTrTdElems[3].innerHTML = `<input class="tableCheckBox" type="checkbox"></input>`
			newDeleteBtn.value = selectedOption.value
			if (newDeleteBtnTd.querySelector('.deleteBtn') == null) {
				newDeleteBtnTd.insertAdjacentElement('beforeend', newDeleteBtn)
			}
			ipsArr.push(newDeleteBtn.value)
			let index = ipsArr.length - 1
			newDeleteBtnTd.addEventListener('click', () => {
				tbody.removeChild(newDeleteBtnTd.closest('tr'))
				ipsArr.splice(index, 1)
			})
			let id = selectedOption.value
		}
	})
})