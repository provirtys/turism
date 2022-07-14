document.addEventListener("DOMContentLoaded", ready());

function ready() {

	//Открытие/закрытие таблиц
	let visitRowElems = document.querySelectorAll('.visits__row')
	let visitsTableElems = document.querySelectorAll('.visits__table')
	visitRowElems.forEach(visitsRow => {
		visitsRow.addEventListener("click", (e) => {
			if (e.target == visitsRow) {
				visitsRow.classList.toggle('active')
				let table = visitsRow.nextElementSibling
				let visitsSubject = visitsRow.parentElement
				if (table.style.maxHeight) {
					table.style.maxHeight = null
					visitsSubject.style.gap = null
				}
				else {
					table.style.maxHeight = table.scrollHeight + 'px'
					visitsSubject.style.gap = '20px'
				}
			}

		})
	})


	//Нажатие на ячейку 
	visitsTableElems.forEach(visitsTable => {
		let cellElems = visitsTable.querySelectorAll('.cell')
		cellElems.forEach(cell => {
			cell.addEventListener('click', () => {
				fio = cell.closest('tr').querySelector('td').attributes.value.value
				date = visitsTable.rows[0].cells[cell.cellIndex].attributes.value.value.trim()

				if (cell.textContent.trim() == '') {
					cell.textContent = '+'
				}
				else {
					cell.textContent = ''
				}
			})
		})
	})

	let saveBtnElems = document.querySelectorAll('.save')


	//Сохранить посещения по предмету
	saveBtnElems.forEach(saveBtn => {
		saveBtn.addEventListener('click', () => {
			let id_subject = saveBtn.closest('div').attributes.value.value
			let arr = []
			let cells = saveBtn.closest('div').nextElementSibling.querySelectorAll('td.cell');
			cells.forEach(cell => {
				if (cell.textContent == '+') {
					let visitsTable = saveBtn.closest('div').nextElementSibling
					let fio = cell.closest('tr').querySelector('td').attributes.value.value
					let date = visitsTable.rows[0].cells[cell.cellIndex].attributes.value.value.trim()
					let visit = {
						fio: fio,
						id_shedule: date,
					}
					arr.push(visit)
				}

			});
			console.log(arr);
			var data = {
				action: "editVisitsSubject_action",
				id_subject: id_subject,
				visits: arr
			}
			jQuery.post(
				myajaxurl.ajaxurl,
				data,
				function (response) {
					console.log(response);
				})
		})
	})

	var data = {
		action: "getVisits_action",
	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			let visits = response
			let cells = document.querySelectorAll('.cell')
			cells.forEach(cell => {
				visits.forEach(visit => {
					let visitsTable = cell.closest('table')
					let curFio = cell.closest('tr').querySelector('td').attributes.value.value
					let curDate = visitsTable.rows[0].cells[cell.cellIndex].attributes.value.value.trim()
					id_shedule = visit['ID_shedule']
					id_people = visit['ID_people']
					if(id_shedule == curDate && id_people == curFio){
						cell.textContent = '+'
					}
				});
			});
		},
		"json"
	)

}
