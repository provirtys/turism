"use strict"


let peopleSelect = document.querySelector('#people')
let table = document.querySelector('table')
let noRows = document.querySelector('.no-rows')
let tBody = document.querySelector('tbody')
let stringTbody = ''
let downloadRow = document.querySelector('.downloadImg').closest('.form__row')
let downloadBtn = document.querySelector('.downloadBtn')
let hiddenForm = document.querySelector('.hiddenForm')
let arrExp = []
let maxLvls

composeExperienceStart()

function composeExperienceStart() {
	peopleSelect.addEventListener("change", () => {
		document.querySelector('html').classList.add('wait')
		let id_people = peopleSelect.value
		if (peopleSelect.value == 'notChosen') {
			id_people = null
			downloadRow.setAttribute('hidden', '')
		}
		else {
			downloadRow.removeAttribute('hidden')
		}
		let data = {
			action: "composeExperience_action",
			id_people: id_people
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				document.querySelector('html').classList.remove('wait')
				composeExperience(response)
			},
			"json"
		)
	})
}

function composeExperience(response) {

	arrExp = []
	let inputFio = hiddenForm.querySelector('input[name=fio]')
	let inputDateOfBirth = hiddenForm.querySelector('input[name=dateOfBirth]')
	let inputDateStartYear = hiddenForm.querySelector('input[name=dateStartYear]')
	let inputAddress = hiddenForm.querySelector('input[name=address]')
	let inputEmail = hiddenForm.querySelector('input[name=email]')
	let inputJob = hiddenForm.querySelector('input[name=job]')
	let inputCurrentRank = hiddenForm.querySelector('input[name=currentRank]')

	let experiences = response[0]
	peopleSelect.dataset.dateOfBirth = '12.04.1999'
	stringTbody = ""
	if (experiences.length > 0) {
		table.removeAttribute('hidden')
		noRows.setAttribute('hidden', '')

		inputFio.value = experiences[0].fio
		let dateOfBirth = experiences[0].Date_of_birth
		if (dateOfBirth != null) {
			inputDateOfBirth.value = formatDate(dateOfBirth)
		}
		if (response[0]) {
			inputAddress.value = experiences[0].address
			inputEmail.value = experiences[0].email
			inputJob.value = experiences[0].job
		}
		if (response[1]) {
			inputDateStartYear.value = response[1][0].startYear
		}

		if (response[2] && response[2][0] && response[2][0]) {
			inputCurrentRank.value = response[2][0].Name + ' ' + response[2][0].rankYear
		}
		maxLvls = response[3]
		experiences.forEach((exp, i) => {
			let periodFrom = new Date(exp['Start_date'])
			let dd = periodFrom.getDate();
			if (dd < 10) dd = '0' + dd;

			let mm = periodFrom.getMonth() + 1;
			if (mm < 10) mm = '0' + mm;

			let yy = periodFrom.getFullYear();
			if (yy < 10) yy = '0' + yy;

			periodFrom = dd + '.' + mm + '.' + yy;

			let periodTo = new Date(exp['End_date'])
			dd = periodTo.getDate();
			if (dd < 10) dd = '0' + dd;

			mm = periodTo.getMonth() + 1;
			if (mm < 10) mm = '0' + mm;

			yy = periodTo.getFullYear();
			if (yy < 10) yy = '0' + yy;

			periodTo = dd + '.' + mm + '.' + yy;

			let date = periodFrom + '-' + periodTo

			stringTbody += `<tr>

			<td>`+ exp['fio'] + `</td>
			<td>`+ date + `</td>
			<td>`+ exp['Region'] + `</td>
			<td>`+ exp['typeUtp'] + `</td>
			<td>`
			if (exp['ID_position'] != 8) {
				stringTbody += '+'
			}
			stringTbody += `</td>
			<td>`
			if (exp['ID_position'] == 8) {
				stringTbody += '+'
			}
			stringTbody += `</td>
			<td>`+ exp['Difficulty'] + `</td>
		</tr>`
			arrExp.push({
				number: i,
				date: periodTo,
				region: exp['Region'],
				type: exp['typeUtp'],
				role: exp['ID_position'],
				cat: exp['Difficulty'],
			})
			let inputExp = document.createElement('input')
			inputExp.setAttribute('name', 'exp exp' + i)
			inputExp.value = JSON.stringify(arrExp[i])
			hiddenForm.insertAdjacentElement('beforeend',inputExp)

		});
		tBody.innerHTML = stringTbody
		document.querySelector('input[name=count]').value = tBody.childElementCount

	}
	else {
		table.setAttribute('hidden', '')
		noRows.removeAttribute('hidden', '')
	}

}


//Кнопка скачать документ
downloadBtn.addEventListener('click', () => {
	let jsonArrExp = JSON.stringify(arrExp);
	let jsonmaxLvls = JSON.stringify(maxLvls);

	let inputValues = document.querySelector('input[name=values]')
	inputValues.value = jsonArrExp

	let inputMaxLvls = document.querySelector('input[name=maxLvls')
	inputMaxLvls.value = jsonmaxLvls

// 	console.log(inputMaxLvls.value);

// 	console.log(inputValues.value);
	// let data = {
	// 	action: "testPhp_action",
	// 	arr: jsonArrExp,
	// }
	// console.log(data.arr);
	// jQuery.post(
	// 	myajaxurl.ajaxurl,
	// 	data,
	// 	function (response) {
	// 		console.log(response);
	// 	},
	// 	// "json"
	// )

	hiddenForm.submit()

})

function formatDate(input) {
	const [year, month, day] = input.split('-');
	const result = [day, month, year].join('.');

	return result;
}
