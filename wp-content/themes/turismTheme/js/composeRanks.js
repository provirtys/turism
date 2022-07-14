"use strict"
let peopleSelect = document.querySelector('#people')
let table = document.querySelector('table')
let noRows = document.querySelector('.no-rows')
let tBody = document.querySelector('tbody')
let stringTbody = ''
let userID = document.querySelector('.userID').textContent

composeRanksStart()

function composeRanksStart() {
	peopleSelect.addEventListener("change", () => {
		let id_people = peopleSelect.value
		if (peopleSelect.value == 'notChosen') {
			id_people = null
		}
		let data = {
			action: "composeRanks_action",
			id_people: id_people
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				composeRanks(response)
			},
			"json"
		)
	})
}

function composeRanks(response) {
	let declares = response[0]
	let dateEndArr = response[1]
	let today = response[2]
	stringTbody = ""
	if (declares.length > 0) {
		table.removeAttribute('hidden')
		declares.forEach((declare, i) => {
			stringTbody += `<tr>

			<td>
								<button class="editBtn tableBtn" value="`+ declare['id_declares'] + `"`
								if(userID == '100-00' ||  userID == declare.kpk.substr(0,6)){
								}
								else{
									stringTbody += 'disabled'
								}
								stringTbody +=`>
									<svg version="1.1" id="Layer_1" class="editImg tableImg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
										<g id="XMLID_23_">
											<path id="XMLID_24_" d="M75,180v60c0,8.284,6.716,15,15,15h60c3.978,0,7.793-1.581,10.606-4.394l164.999-165
		c5.858-5.858,5.858-15.355,0-21.213l-60-60C262.794,1.581,258.978,0,255,0s-7.794,1.581-10.606,4.394l-165,165
		C76.58,172.206,75,176.022,75,180z M105,186.213L255,36.213L293.787,75l-150,150H105V186.213z" />
											<path id="XMLID_27_" d="M315,150.001c-8.284,0-15,6.716-15,15V300H30V30H165c8.284,0,15-6.716,15-15s-6.716-15-15-15H15
		C6.716,0,0,6.716,0,15v300c0,8.284,6.716,15,15,15h300c8.284,0,15-6.716,15-15V165.001C330,156.716,323.284,150.001,315,150.001z" />
										</g>
									</svg>
								</button>

							</td>
			<td>`+ declare['fio'] + `</td>
			<td>`+ declare['doc'] + `</td>
			<td>`+ declare['date'] + `</td>`
			let dateComparisonTodayArr = today.split('.')
			let dateComparisonEndArr = dateEndArr[i].split('.')

			let dateComparisonToday = new Date();
			dateComparisonToday.setFullYear(dateComparisonTodayArr[2])
			dateComparisonToday.setMonth(dateComparisonTodayArr[1])
			dateComparisonToday.setDate(dateComparisonTodayArr[0])

			let dateComparisonEnd = new Date();
			dateComparisonEnd.setFullYear(dateComparisonEndArr[2])
			dateComparisonEnd.setMonth(dateComparisonEndArr[1])
			dateComparisonEnd.setDate(dateComparisonEndArr[0])

			if (dateComparisonToday > dateComparisonEnd && dateEndArr[i] != '-') {
				stringTbody += `<td style="color:red">` + dateEndArr[i] + `</td>`
			}
			else {
				stringTbody += `<td>` + dateEndArr[i] + `</td>`
			}
			stringTbody +=
				`<td>` + declare['kpk'] + `</td>
			<td>`

			let typesString = declare['types'].replace(/\s/g, '');
			let typesArr = typesString.split(',');

			let isFirst = true;
			typesArr.forEach(type => {
				if (!isFirst)
					stringTbody += ', ';

				if (Number(type) > 0)
					isFirst = false;

				if (type == '1')
					stringTbody += 'пешеходный';
				else if (type == '2')
					stringTbody += 'лыжный';
				else if (type == '3')
					stringTbody += 'горный';
				else if (type == '4')
					stringTbody += 'водный';
				else if (type == '5')
					stringTbody += 'велосипедный';
				else if (type == '6')
					stringTbody += 'авто-мото';
				else if (type == '7')
					stringTbody += 'спелео';
				else if (type == '8')
					stringTbody += 'парусный';
				else if (type == '9')
					stringTbody += 'конный';
			});
			stringTbody += `</td>
			<td>`+ declare['rank'] + `</td>
	
		</tr>`
		});
		tBody.innerHTML = stringTbody
		updateBtns()
	}
	else {
		table.setAttribute('hidden', '')
		noRows.removeAttribute('hidden', '')
	}
}

//Модалка
let modals = document.querySelector('.modals')
let modalCloseBtn = document.querySelector(".modal-close-btn")
let form = document.querySelector('form')
updateBtns()
let data
let id_declare

form.addEventListener('submit', (e) => {
	e.preventDefault()


	let people = modals.querySelector('#people').value
	let rank = document.querySelector('#rank').value
	let date = document.querySelector('#date').value
	let checkBoxes = document.querySelectorAll('[type=checkbox]:checked')
	let typeValues = []
	checkBoxes.forEach(element => {
		typeValues.push(element.dataset.id)
	});
	let doc = document.querySelector('#doc').value

	var data = {
		action: "saveRank_action",
		id_declare: id_declare,
		people: people,
		rank: rank,
		types: typeValues,
		date: date,
		doc: doc,

	}
	console.log(data);
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			// console.log(response);
			location.reload()

		});
})
modalCloseBtn.addEventListener('click', (e) => {
	modals.classList.remove('active')
	document.body.classList.remove('lock');

	form.reset()
});
modals.addEventListener('click', (e) => {
	if (e.target == modals) {
		modalCloseBtn.click()
	}
});

function updateBtns() {
	let editBtnElems = document.querySelectorAll('.editBtn')
	editBtnElems.forEach(editBtn => {
		editBtn.addEventListener('click', () => {
			document.querySelector('html').classList.add('wait')
			id_declare = editBtn.value;
			data = {
				action: "editDeclare_action",
				id_declare: id_declare,
			}
			jQuery.post(
				myajaxurl.ajaxurl,
				data,
				function (response) {
					editDeclare(response);
				},
				"json"
			)
		})
	});
}

function editDeclare(declare) {
	document.querySelector('html').classList.remove('wait')
	let typesArr = declare['ID_types_of_utp'].split(',')
	modals.querySelector('#people').value = declare['ID_people']
	modals.querySelector('#doc').value = declare['doc']
	modals.querySelector('#rank').value = declare['ID_rank']
	modals.querySelector('#date').value = declare['Date']

	console.log(typesArr);
	typesArr.forEach(element => {
		element = element.trim()
		let checkBox = modals.querySelector('[data-id="' + element + '"]')
		checkBox.checked = true;
	});


	modals.classList.add('active')
	document.body.classList.add('lock');
}


