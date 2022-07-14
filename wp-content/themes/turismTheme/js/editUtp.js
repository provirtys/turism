"use strict";


start()
function start() {



	let editBtnElems = document.querySelectorAll(".editBtn");
	editBtnElems.forEach((editBtn) => {

		editBtn.addEventListener("click", () => {
			let id_utp = editBtn.value;
			var mainBox = document.querySelector(".main__container");
			mainBox.animate({ opacity: 0.5 }, 500)
			var data = {
				action: "editUtp_action",
				id_utp: id_utp,
			}
			jQuery.post(
				myajaxurl.ajaxurl,
				data,
				function (response) {
					let idUtp = response[0][0]['ID_utp']
					let nameUtp = response[0][0]['Name']
					let startDate = response[0][0]['Start_date']
					let endDate = response[0][0]['End_date']
					let type = response[0][0]['type']
					let difficulty = response[0][0]['Difficulty']
					let leader = response[0][0]['people']
					let idPeople = response[0][0]['id_people']
					let idType = response[0][0]['idType']


					let people = response[1]
					let types = response[2]
					let students = response[3]
					let studentsAll = response[4]


					var stringHTML = ''




					stringHTML = `<form class="form">
				<p class="form__title">Изменить поход</p>
				<div class="form__block">
					<div class="form__row">
						<label for="nameUtp">Название</label>
						<input id="nameUtp" type="text" name="nameUtp" value="` + nameUtp + `">
					</div>
					<div class="form__row form__rowPeriod" >
						<label>Период</label>
						<p>С</p>
						<input type="date" class="periodFrom period" value="` + startDate + `">
						<p>По</p>
						<input type="date" class="periodTo period" value="` + endDate + `">
					</div>
					<div class="form__row">
						<label>Вид похода</label>
						<select id="typeUtp" name="typeUtp">`;
					types.forEach(type => {

						stringHTML += `<option `
						if (type['ID_types_of_utp'] == idType) {
							stringHTML += 'selected '
						}

						stringHTML += `value = "` + type['ID_types_of_utp'] + `">` + type['Name'] + `</option>`
					})
					stringHTML += `</select>
						</div> 
						<div class="form__row">
						<label>Сложность похода</label>
						<input type="number" name="difficultyUtp" value="` + difficulty + `">
					</div>
					<div class="form__row">
						<label>Руководитель</label>
						<select id="leaderUtp" name="leaderUtp">`

					people.forEach(man => {
						stringHTML += `<option `
						if (man['ID_people'] == idPeople) {
							stringHTML += 'selected '
						}

						stringHTML += `value = "` + man['ID_people'] + `">` + man['Name'] + `</option>`
					})

					stringHTML += `		</select>
				</div>`

					//Таблица учеников
					stringHTML += `<p class="tableName">Ученики</p>
				<input class="form-control" type="search" placeholder="Поиск" id="search-text" onkeyup="tableSearch()">

				<div class="container-table-members container">

					<table class="table table-members" id="info-table">
						<thead>
							<tr>
								<th onclick="sortTable(0)" class="thCheckBox th"></th>
								<th onclick="sortTable(1)" class="th">ФИО</th>
							</tr>
						</thead>
						<tbody>`


					let studentsString = ''
					students.forEach(element => {
						studentsString += ' ' + element['id_people'] + ' '
					});

					studentsAll.forEach(student => {

						stringHTML += `<tr>
						<td class="tdCheckBox">
							<input`

						//Если участник похода
						if (studentsString.includes(' ' + student['id_people'] + ' ')) {
							stringHTML += ` checked `
						}

						stringHTML += ` type="checkbox" class="tableCheckBox" id="student` + student['id_people'] + `" value="` + student['id_people'] + `">
						</td>
						<td>
							<label class="tdLabel" for="student`+ student['id_people'] + `">` + student['Name'] + `</label>
						</td>
					</tr> `

					});
					stringHTML += `</tbody>
				</table>
			</div>`
					stringHTML += `<input id="orderDate" type="date" name="orderDate" hidden>

				<button class="form__resetbtn btn" type="reset">Сброс</button>
				<button class="form__submit btn">Сохранить</button>
				</div>

			</form>
		</div>
				`
					mainBox.innerHTML = stringHTML;
					mainBox.animate({ opacity: 1 }, 500)


					formAppears(idUtp);

				},
				"json"
			);


		});
	})



	function formAppears(idUtp) {

		let form = document.querySelector('form');
		let saveBtn = document.querySelector('.form__submit');

		saveBtn.addEventListener('click', function () {
			var nameUtp = $('input[name=nameUtp]');
			var dateFromUtp = $('.periodFrom');
			var dateToUtp = $('.periodTo');
			var typeUtp = $('select[name=typeUtp');
			var difficultyUtp = $('input[name=difficultyUtp]');
			var leaderUtp = $('select[name=leaderUtp]');
			var tableCheckBoxArr = document.querySelectorAll("input[type='checkbox']:checked")
			var checkedValues = Array.from(tableCheckBoxArr).map(cb => cb.value)
			let data = {
				action: "saveUtp_action",
				ID_utp: idUtp,
				name: nameUtp.val(),
				id_type_of_utp: typeUtp.val(),
				difficulty: difficultyUtp.val(),
				start_date: dateFromUtp.val(),
				end_date: dateToUtp.val(),
				leader: leaderUtp.val(),
				students: checkedValues
			}
			jQuery.post(
				myajaxurl.ajaxurl,
				data,
				function (response) {
					location.href = response
				}
			)
		}
		)


		form.addEventListener('submit', (e) => {
			e.preventDefault()
		})

	}


	let acceptBtnElems = document.querySelectorAll(".acceptBtn")

	//Завершить поход
	acceptBtnElems.forEach(acceptBtn => {
		acceptBtn.addEventListener("click", () => {
			let utpApproved = acceptBtn.closest('td').previousElementSibling.querySelector('p').textContent
			if (utpApproved == 'Утвержден') {
				let idUtp = acceptBtn.parentElement.parentElement.querySelector(".editBtn").value
				var d = new Date();
				var day = d.getDate(); if (day < 10) day = '0' + day;
				var month = d.getMonth() + 1; if (month < 10) month = '0' + month;
				var year = d.getFullYear();
				let date = year + "-" + month + "-" + day;


				var data = {
					action: "acceptUtp_action",
					idUtp: idUtp,
					date: date,
				}
				jQuery.post(
					myajaxurl.ajaxurl,
					data,
					function (response) {
						acceptBtn.outerHTML = `<button class="tableBtn">
					<svg class="tableImg tableImg-accepted" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="399px" height="399px" viewBox="0 0 399 399" style="enable-background:new 0 0 399 399;" xml:space="preserve">
						<g>
							<path d="M374.195,241.486l-25.323-71.712l25.568-72.409c1.356-3.843,0.765-8.104-1.59-11.432
	c-2.354-3.328-6.176-5.306-10.251-5.306c0,0-121.6,0-129.267,0c-7.979,0-7.596-4.415-7.596-4.415
	c0-27.587-16.988-39.896-36.559-39.896H82.003c2.44-3.742,3.82-8.172,3.82-12.816c0-12.958-10.542-23.5-23.5-23.5h-15
	c-12.958,0-23.5,10.542-23.5,23.5c0,8.14,4.226,15.629,11,19.889V399h40V237.307h115.504c1.922,0,5.411,0.578,5.411,6v0.614
	c0,8.284,6.716,15,15,15c0.015,0,0.027-0.002,0.043-0.002c0.014,0,0.027,0.002,0.041,0.002H362.6c0.007,0,0.014,0,0.021,0
	c6.935,0,12.556-5.622,12.556-12.557C375.176,244.635,374.827,242.986,374.195,241.486z" />
					</svg>
				</button>`
					})
			}
			else{
				alert("Сначала поход должна утвердить МКК")
			}

		})
	})

	var periodFrom
	var periodTo
	var table = document.querySelector('table')
	var btnUtp = document.querySelector(".btnUtp")

	btnUtp.addEventListener("click", () => {
		periodFrom = document.querySelector(".periodFrom").value
		periodTo = document.querySelector(".periodTo").value
		var data = {
			action: "composeUtp_action",
			dateFrom: periodFrom,
			dateTo: periodTo,
		}

		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				composeUtp(response)

			},
			"json"
		);
	})


	var stringTable
	function composeUtp(response) {
		let utps = response

		//Если походы за период есть
		if (utps.length > 0) {
			table.removeAttribute('hidden')
			document.querySelector('.noUtp').textContent = ""

			stringTable = ``

			utps.forEach(utp => {
				stringTable += `<tr>
			<td>`
				if (utp['date_accept'] == null) {
					stringTable += `<button value="` + utp['ID_utp'] + `" class="editBtn tableBtn">
						<svg version="1.1" id="Layer_1" class="editImg tableImg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
							<g id="XMLID_23_">
								<path id="XMLID_24_" d="M75,180v60c0,8.284,6.716,15,15,15h60c3.978,0,7.793-1.581,10.606-4.394l164.999-165
c5.858-5.858,5.858-15.355,0-21.213l-60-60C262.794,1.581,258.978,0,255,0s-7.794,1.581-10.606,4.394l-165,165
C76.58,172.206,75,176.022,75,180z M105,186.213L255,36.213L293.787,75l-150,150H105V186.213z" />
								<path id="XMLID_27_" d="M315,150.001c-8.284,0-15,6.716-15,15V300H30V30H165c8.284,0,15-6.716,15-15s-6.716-15-15-15H15
C6.716,0,0,6.716,0,15v300c0,8.284,6.716,15,15,15h300c8.284,0,15-6.716,15-15V165.001C330,156.716,323.284,150.001,315,150.001z" />
							</g>
						</svg>
					</button>`
				}


				stringTable += `</td >
			<td>` + utp['name'] + `</td>
			<td>` + utp['Start_date'] + `</td>
			<td>` + utp['End_date'] + `</td>
			<td>` + utp['type'] + `</td>
			<td>` + utp['Difficulty'] + `</td>
			<td>` + utp['leader'] + `</td>
			<td>`
				if (utp['date_accept'] == null) {
					stringTable += `<button class="tableBtn acceptBtn">
				<svg class="tableImg tableImg-accept" version=" 1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
					<g>
						<path d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M165,300
						c-74.44,0-135-60.561-135-135S90.56,30,165,30s135,60.561,135,135S239.439,300,165,300z" />
						<path d="M226.872,106.664l-84.854,84.853l-38.89-38.891c-5.857-5.857-15.355-5.858-21.213-0.001
						c-5.858,5.858-5.858,15.355,0,21.213l49.496,49.498c2.813,2.813,6.628,4.394,10.606,4.394c0.001,0,0,0,0.001,0
						c3.978,0,7.793-1.581,10.606-4.393l95.461-95.459c5.858-5.858,5.858-15.355,0-21.213
						C242.227,100.807,232.73,100.806,226.872,106.664z" />
					</g>

				</svg>

			</button>`
				}
				else {
					stringTable += `<button class="tableBtn">
				<svg class="tableImg tableImg-accepted" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="399px" height="399px" viewBox="0 0 399 399" style="enable-background:new 0 0 399 399;" xml:space="preserve">
					<g>
						<path d="M374.195,241.486l-25.323-71.712l25.568-72.409c1.356-3.843,0.765-8.104-1.59-11.432
c-2.354-3.328-6.176-5.306-10.251-5.306c0,0-121.6,0-129.267,0c-7.979,0-7.596-4.415-7.596-4.415
c0-27.587-16.988-39.896-36.559-39.896H82.003c2.44-3.742,3.82-8.172,3.82-12.816c0-12.958-10.542-23.5-23.5-23.5h-15
c-12.958,0-23.5,10.542-23.5,23.5c0,8.14,4.226,15.629,11,19.889V399h40V237.307h115.504c1.922,0,5.411,0.578,5.411,6v0.614
c0,8.284,6.716,15,15,15c0.015,0,0.027-0.002,0.043-0.002c0.014,0,0.027,0.002,0.041,0.002H362.6c0.007,0,0.014,0,0.021,0
c6.935,0,12.556-5.622,12.556-12.557C375.176,244.635,374.827,242.986,374.195,241.486z" />
				</svg>
			</button>`
				}
			});
			table.querySelector('tbody').innerHTML = stringTable
		}
		//Если занятий за период нет
		else {
			table.setAttribute('hidden', '')
			document.querySelector('.noUtp').textContent = "Занятий на выбранный период нет"
		}
		start()
	}
}