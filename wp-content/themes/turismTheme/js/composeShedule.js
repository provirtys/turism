"use strict";

var form = document.querySelector("form")
var composeBtnSchool = document.querySelector(".composeBtnSchool")
var composeBtnStaff = document.querySelector(".composeBtnStaff")
var school = document.querySelector("#school")
var staff = document.querySelector("#staff")

var containerTable = document.querySelector(".container-table")
var data = {}
var schoolVal
var staffVal
var stringHTML = ""
var table = document.querySelector("table")
var stringTable = ""
var tableName = document.querySelector(".tableName")
var weekArr = []
var periodFrom
var periodTo
var hint = document.querySelector('.hint')
var currentBtn = ''
var currentClassId = ''
composeBtnSchool.addEventListener("click", () => {
	if (school.value != "notChosen") {
		currentBtn = 'school'

		schoolVal = school.value
		periodFrom = document.querySelector(".periodFrom").value
		periodTo = document.querySelector(".periodTo").value
		data = {
			action: "composeSheduleSchool_action",
			id_school: schoolVal,
			dateFrom: periodFrom,
			dateTo: periodTo,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				composeShedule(response, "school")

			},
			"json"
		);
	}
	else {
		alert("Выберите школу")
	}
})

composeBtnStaff.addEventListener("click", () => {
	if (staff.value != "notChosen") {
		currentBtn = 'staff'
		staffVal = staff.value
		periodFrom = document.querySelector(".periodFrom").value
		periodTo = document.querySelector(".periodTo").value
		data = {
			action: "composeSheduleStaff_action",
			id_people: staffVal,
			dateFrom: periodFrom,
			dateTo: periodTo,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				composeShedule(response, "staff")

			},
			"json"
		);
	}
	else {
		alert("Выберите преподавателя")
	}
})


// school.addEventListener("change", () => {
// 	if (school.value != "notChosen") {
// 		schoolVal = school.value
// 		data = {
// 			action: "selectStaffForShedule_action",
// 			id_school: schoolVal
// 		}
// 		jQuery.post(
// 			myajaxurl.ajaxurl,
// 			data,
// 			function (response) {

// 				stringHTML = ""
// 				if (response.length > 0) {
// 					response.forEach(people => {
// 						stringHTML +=
// 							`<option value="` + people.ID_people + `">` + people.Name + `</option>`
// 					});
// 				}
// 				else {
// 					stringHTML = `<option value="notChosen">-Преподавателей в школе нет-</option>`
// 				}
// 				staff.innerHTML = stringHTML


// 			},
// 			"json"
// 		)
// 	}
// })

function getWeekDay(date) {
	let days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];

	return days[date.getDay()];
}

function composeShedule(response, stringFrom) {
	let classes = response[0]
	//Если занятия за период есть
	if (classes.length > 0) {
		tableName.removeAttribute('hidden')
		hint.removeAttribute('hidden')
		periodFrom = new Date(periodFrom)
		let dd = periodFrom.getDate();
		if (dd < 10) dd = '0' + dd;

		let mm = periodFrom.getMonth() + 1;
		if (mm < 10) mm = '0' + mm;

		let yy = periodFrom.getFullYear();
		if (yy < 10) yy = '0' + yy;

		periodFrom = dd + '.' + mm + '.' + yy;

		periodTo = new Date(periodTo)
		dd = periodTo.getDate();
		if (dd < 10) dd = '0' + dd;

		mm = periodTo.getMonth() + 1;
		if (mm < 10) mm = '0' + mm;

		yy = periodTo.getFullYear();
		if (yy < 10) yy = '0' + yy;

		periodTo = dd + '.' + mm + '.' + yy;
		switch (stringFrom) {

			case "school":

				tableName.textContent = "Расписание для " + school.options[school.selectedIndex].text + " с " + periodFrom + " по " + periodTo;
				break
			case "staff":
				tableName.textContent = "Расписание для " + staff.options[staff.selectedIndex].text + " с " + periodFrom + " по " + periodTo;
				break
		}
		periodFrom = document.querySelector(".periodFrom").value
		periodTo = document.querySelector(".periodTo").value
		var options = {
			year: 'numeric',
			month: 'numeric',
			day: 'numeric',
			timezone: 'UTC'
		};
		stringTable = `
		<thead>
			<tr>`
		let numberDays = ((new Date(periodTo) - new Date(periodFrom)) / 1000 / 60 / 60 / 24)
		if (numberDays >= 7) {
			containerTable.classList.add('overflow-x')

		}
		else {
			containerTable.classList.remove('overflow-x')
		}

		let date = new Date(periodFrom)
		let dateArr = []
		//Вывод дат и дней недели периода
		weekArr = []
		for (let i = 0; i <= numberDays; i++) {
			dateArr[i] = new Date(date)
			weekArr[i] = new Date(Date.parse(date)).toISOString().substr(0, 10)
			stringTable +=
				`<th>` + date.toLocaleString("ru", options) + '<br> (' + getWeekDay(date) + `)</th>`
			date.setDate(date.getDate() + 1)

		}
		stringTable +=
			`</tr>
		</thead>
		<tbody>`
		for (let i = 0; i < response[1][0].max; i++) {

			stringTable += `<tr>`
			for (let j = 0; j <= numberDays; j++) {
				stringTable += `<td></td>`
			}
			stringTable += `</tr>`
		}
		stringTable += `</tbody>`

		table.innerHTML = stringTable
		let currentRow = 0
		weekArr.forEach((elementTHead, col) => {
			currentRow = 1
			let timeString
			classes.forEach((element, i) => {
				if (element.date == elementTHead) {
					timeString = element.date + 'T' + element.time_of_start
					let currentDate = new Date(timeString)
					let endTime = new Date(currentDate.setMinutes(currentDate.getMinutes() + element.duration))
					let hour = endTime.getHours().toString().length < 2 ? '0' + endTime.getHours() : endTime.getHours();
					let minutes = endTime.getMinutes().toString().length < 2 ? '0' + endTime.getMinutes() : endTime.getMinutes();
					endTime = hour + ':' + minutes
					table.rows[currentRow].cells[col].value = element.id
					table.rows[currentRow].cells[col].addEventListener('contextmenu', (e) => editClass(element.id, e))
					table.rows[currentRow].cells[col].innerHTML =
						'<p> Время: <br>' + '<b>' + element.time_of_start.substr(0, 5) + ' - ' + endTime + '</b><br> </p>' +
						'<p>Тематика занятия: ' + '<b>' + element.name + '</b><br></p>' +
						'<p>Тип занятия: ' + '<b>' + element.type + '</b><br></p>'
					if (stringFrom == "school") {
						table.rows[currentRow].cells[col].innerHTML += '<p>Преподаватель: ' + '<b>' + element.Name + '</b><br</p>'
					}
					else if (stringFrom == "staff") {
						table.rows[currentRow].cells[col].innerHTML += '<p>Школа: ' + '<b>' + element.school + '</b><br</p>'
					}
					currentRow++
				}

			})
		})

	}
	//Если занятий за период нет
	else {
		hint.setAttribute('hidden', '')
		containerTable.classList.remove('overflow-x')
		table.innerHTML = "<p>Занятий на выбранный период нет</p>"
		tableName.setAttribute('hidden', '')
	}
}

let modals = document.querySelector('.modals')
let modalCloseBtn = document.querySelector(".modal-close-btn")
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
function editClass(id_class, e) {
	document.querySelector('html').classList.add('wait')
	e.preventDefault()
	data = {
		action: "editClass_action",
		id_shedule: id_class,
	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			document.querySelector('html').classList.remove('wait')
			let currentClass = response[0]
			currentClassId = currentClass['ID_shedule']
			let subjects = response[1]

			let staff = response[2]
			document.querySelector("#date").value = currentClass['Date']
			document.querySelector("#time").value = currentClass['Time_of_start']
			document.querySelector("#duration").value = currentClass['Duration']
			document.querySelector("#subject").value = currentClass['ID_subject']
			document.querySelector("#type").value = currentClass['ID_type_of_class']
			document.querySelector("#modal-staff").value = currentClass['ID_people']
			console.log(currentClass['ID_people']);

			modals.classList.toggle('active')
			document.body.classList.add('lock');
		},
		"json"
	)


}

function changeSubjectInsertClass() {

	data = {
		action: "changeSubjectInsertClass_action",
		id_subject: subjectSelect.value,
	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			stringHTML = ""
			if (response.length > 0) {
				stringHTML +=
					`<option value="notChosen">-Не выбрано-</option>`
				response.forEach(staff => {
					stringHTML +=
						`<option value="` + staff.ID_people + `">` + staff.Name + `</option>`
				});
			}
			else {
				stringHTML +=
					`<option value="notChosen">-Преподавателей по этой тематике нет-</option>`
			}
			staffSelect.innerHTML = stringHTML
			document.querySelector("#modal-staff").value = currentStaff
		},
		"json"
	)
}

let saveBtn = document.querySelector('.form__submit')


saveBtn.addEventListener('click', () => {
	document.querySelector('html').classList.add('wait')
	let date = document.querySelector("#date").value
	let time = document.querySelector("#time").value
	let duration = document.querySelector("#duration").value
	let subject = document.querySelector("#subject").value
	let staff = document.querySelector("#modal-staff").value
	let type = document.querySelector("#type").value
	if (date != '' && time != '' && duration != '' && subject != 'notChosen' && staff != 'notChosen' && type != 'notChosen') {


		data = {
			action: "saveShedule_action",
			id_shedule: currentClassId,
			date: date,
			time: time,
			duration: duration,
			subject: subject,
			staff: staff,
			type: type,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				document.querySelector('html').classList.remove('wait')
				modals.classList.toggle('active')
				document.body.classList.remove('lock');
				if (currentBtn == 'school') {
					composeBtnSchool.click()
				}
				else if (currentBtn == 'staff') {
					composeBtnStaff.click()
				}

			});
	}
	else {
		alert('Заполните все поля')
	}
})

form.addEventListener('submit', (e) => {
	e.preventDefault();
})