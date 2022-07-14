//Модалка
let modals = document.querySelector('.modals')
let modalCloseBtn = document.querySelector(".modal-close-btn")
let form = document.querySelector('form')
let showInfoTdElems = document.querySelectorAll('.showInfoTd')
let data
let id_declares

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
		id: id_people,
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

showInfoTdElems.forEach(showInfoTd => {
	showInfoTd.addEventListener('click', () => {
		document.querySelector('html').classList.add('wait')
		id_school = showInfoTd.dataset['id_school'];
		data = {
			action: "showInfoSchool_action",
			id_school: id_school,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				document.querySelector('html').classList.remove('wait')
				showInfoSchool(response);
			},
			"json"
		)
	})
});
function showInfoSchool(school) {

	info = school[0][0]
	utp = school[1]
	document.querySelector('#nameSchool').value = info['Name']
	document.querySelector('#typeSchool').value = info['typeSchool']
	document.querySelector('#typeTurism').value = info['typeTurism']
	document.querySelector('#kpk').value = info['kpk']
	document.querySelector('#dateFrom').value = info['Start_date']
	document.querySelector('#dateTo').value = info['End_date']
	document.querySelector('#directorSchool').value = info['director']

	tBody = document.querySelector('.modal tbody')
	tBody.innerHTML = ''
	utp.forEach((elem)=>{
		tr = document.createElement('tr')
		for (let i = 0; i < 4; i++) {
			td = document.createElement('td')
			tr.appendChild(td);
		}
		tr.cells[0].textContent = elem['Name']
		tr.cells[1].textContent = elem['Region']
		tr.cells[2].textContent = elem['Start_date']
		tr.cells[3].textContent = elem['End_date']
		tBody.appendChild(tr)
	})
	

	modals.classList.add('active')
	document.body.classList.add('lock');
}
let saveBtn = document.querySelector('.form__submit')

document.addEventListener('keydown', function(e) {
	if (e.key === 'Escape') {
		modals.classList.remove('active')
		document.body.classList.remove('lock');
	}
	});