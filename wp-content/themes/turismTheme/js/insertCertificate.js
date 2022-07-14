let form = document.querySelector('form')
let submitBtn = document.querySelector('.form__submit')

submitBtn.addEventListener('click', () => {
	let date = document.querySelector('#date').value
	let id_people = document.querySelector('#people').value
	let id_school = document.querySelector('#school').value
	if (date != null && id_people != 'notChosen' && id_school != 'notChosen') {
		//Добавление приказа
		let data = {
			action: "insertOrder_action",
			id_typeOfOrder: 21,
			date: date,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				let id_order = response
				data = {
					action: "insertDiploma_action",
					date: date,
					id_people: id_people,
					id_order: id_order,
					id_school: id_school,
					ips: true,
				}
				jQuery.post(
					myajaxurl.ajaxurl,
					data,
					function (response) {
						location.reload()
					})
			})
	}
	else{
		alert("Заполните все поля")
	}

})

form.addEventListener('submit', (e) => {
	e.preventDefault()
})

let schoolSelect = document.querySelector('#school')
schoolSelect.addEventListener('change', () => {
	if (schoolSelect.value != 'notChosen') {
		let id_school = schoolSelect.value
		let data = {
			action: "getIPSBySchool_action",
			id_school: id_school,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				let ips = response
				let selectIPS = document.querySelector('#people')
				selectIPS.innerHTML = ''
				let option = document.createElement('option')
				option.value = 'notChosen'
				option.innerHTML = '-Не выбрано-'
				selectIPS.append(option)
				ips.forEach(man => {
					option = document.createElement('option')
					option.value = man['id_people']
					option.innerHTML = man['Name']
					selectIPS.append(option)
				});
			},
			"json"
		)
	}
})

