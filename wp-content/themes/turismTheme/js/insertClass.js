"use strict"

var submitBtn = $('.form__submit');
var form = $('form');
var subjectSelect = document.querySelector("#subject")
var staffSelect = document.querySelector("#staff")
var stringHTML = ""
var data;
// subjectSelect.addEventListener("change", () => {
// 	if (subjectSelect.value != "notChosen") {
// 		changeSubjectInsertClass()
// 	}
// 	else {
// 		staffSelect.innerHTML = `<option value="notChosen">-Выберите тематику занятия-</option>`
// 	}

// })

//Валидация даты занятия относительно даты проведения школы
var dateInput = document.querySelector('#date')
var schoolStartDateInput = document.querySelector('.schoolStartDate')
var schoolEndDateInput = document.querySelector('.schoolEndDate')
var validating = false
dateInput.addEventListener('blur', (e) => {
	e.preventDefault()
	if ((dateInput.value <= schoolStartDateInput.value || dateInput.value >= schoolEndDateInput.value) && dateInput.value != "") {
		if (validating == false) {
			validating = true
			alert("Выберите подходящую дату");
			setTimeout(function () {
				dateInput.value = ""
				dateInput.focus();
				validating = false;
			}, 1);
		}
	}
})

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
			else{
				stringHTML +=
					`<option value="notChosen">-Преподавателей по этой тематике нет-</option>`
			}
			staffSelect.innerHTML = stringHTML
		},
		"json"
	)

}




submitBtn.on('click', function () {

	let date = document.querySelector("#date").value
	let time = document.querySelector("#time").value
	let duration = document.querySelector("#duration").value
	let subject = document.querySelector("#subject").value
	let staff = document.querySelector("#staff").value
	let type = document.querySelector("#type").value
	if(date!= '' && time!= '' && duration != '' && subject != 'notChosen' && staff != 'notChosen' && type != 'notChosen'){


	data = {
		action: "insertShedule_action",
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
			location.reload()

		});
	}
	else{
		alert('Заполните все поля')
	}

})

form.submit(function (e) {
	e.preventDefault();
})
