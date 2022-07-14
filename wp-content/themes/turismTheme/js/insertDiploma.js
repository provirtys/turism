let form = document.querySelector('form')
let submitBtn = document.querySelector('.form__submit')

//Выбор школы для фильтрации учеников
let schoolSelect = document.querySelector('#school')
schoolSelect.addEventListener('change', () => {
	if (schoolSelect.value != 'notChosen') {
		let id_school = schoolSelect.value
		let data = {
			action: "getStudentsBySchool_action",
			id_school: id_school,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				let students = response
				let selectStudent = document.querySelector('#people')
				selectStudent.innerHTML = ''
				let option = document.createElement('option')
				option.value = 'notChosen'
				option.innerHTML = '-Не выбрано-'
				selectStudent.append(option)
				students.forEach(student => {
					option = document.createElement('option')
					option.value = student['id_people']
					option.innerHTML = student['Name']
					selectStudent.append(option)
				});
			},
			"json"
		)
	}
})

//Нажатие на кнопку добавления диплома
submitBtn.addEventListener('click', () => {
	let date = document.querySelector('#date').value
	let id_people = document.querySelector('#people').value
	let id_school = document.querySelector('#school').value
	//Если поля не заполнены, то сообщение
	if (date != null && id_people != 'notChosen' && id_school != 'notChosen') {

		data = {
			action: "insertDiploma_action",
			date: date,
			id_people: id_people,
			id_school: id_school,
			ips: false,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				location.reload()
			})
	}
	else {
		alert("Заполните все поля")
	}
})



form.addEventListener('submit', (e) => {
	e.preventDefault()
})
