"use strict"

let peopleSelect = document.querySelector('#people')
let table = document.querySelector('table')
let noRows = document.querySelector('.no-rows')
let tBody = document.querySelector('tbody')
let stringTbody = ''

composeExperienceStart()

function composeExperienceStart() {
	peopleSelect.addEventListener("change", () => {
		document.querySelector('html').classList.add('wait')
		let id_people = peopleSelect.value
		let data
		if (peopleSelect.value == 'notChosen') {
			id_people = null
		}
		let id_page = document.querySelector('.id_page').textContent
		if (id_page == 145) {
			data = {
				action: "composeDiplomas_action",
				id_people: id_people,
				diplomas: true,
			}
		}
		else if (id_page == 199) {
			data = {
				action: "composeDiplomas_action",
				id_people: id_people,
				diplomas: false,
			}
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				document.querySelector('html').classList.remove('wait')
				composeDiplomas(response)
			},
			"json"
		)
	})
}

function composeDiplomas(response) {
	tBody.innerHTML = ''
	response.forEach(elem => {
		console.log(elem);
		let tr = document.createElement('tr')
		let tdFio = document.createElement('td')
		let tdSchool = document.createElement('td')
		let tdLvl = document.createElement('td')
		let tdType = document.createElement('td')
		let tdKpk = document.createElement('td')
		let tdDate = document.createElement('td')
		tdFio.textContent = elem['fio']
		tdSchool.textContent = elem['schoolName']
		tdLvl.textContent =  elem['typeSchool']
		tdType.textContent = elem['typeUtp']
		tdKpk.textContent =  elem['kpk']
		tdDate.textContent = elem['Date']
		tr.appendChild(tdFio)
		tr.appendChild(tdSchool)
		tr.appendChild(tdLvl)
		tr.appendChild(tdType)
		tr.appendChild(tdKpk)
		tr.appendChild(tdDate)
		tBody.appendChild(tr)

	});
}
