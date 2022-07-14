let addBtn = document.querySelector('.btnAdd')
let tbody = document.querySelector('tbody')
let selectPeople = document.querySelector('#people')
let table = document.querySelector('table')
let userRole = document.querySelector('.userRole').textContent
let rowCnt = 0
let curRowCnt = 0
addBtn.addEventListener('click', () => {


	let stringBody = ''
	stringBody = `<tr>
	<td>
		
	</td>
	<td></td>
	<td></td>
</tr>`
	let cloneSelect = selectPeople.cloneNode(true)
	tbody.insertAdjacentHTML('beforeend', stringBody)
	let newMember = table.rows[table.rows.length - 1].cells[1]
	newMember.insertAdjacentElement('beforeend', cloneSelect)
	cloneSelect.removeAttribute('hidden')
	rowCnt++
	cloneSelect.addEventListener('blur', () => {
		if (cloneSelect.value != 'notChosen') {
			let newDeleteBtnTd = cloneSelect.closest('tr').querySelector('td')
			newMember.textContent = cloneSelect.options[cloneSelect.selectedIndex].textContent
			newDeleteBtnValue = cloneSelect.value
			let deleteBtn = document.querySelector('.deleteBtn').cloneNode(true)
			deleteBtn.removeAttribute('hidden')
			console.log(newDeleteBtnTd);
			newDeleteBtnTd.insertAdjacentElement('beforeend', deleteBtn)
			let newDeleteBtn = newDeleteBtnTd.querySelector('button')
			newDeleteBtn.value = newDeleteBtnValue
			table.rows[table.rows.length - 1].cells[2].textContent = 'Член комиссии'
			id = newDeleteBtn.value
			data = {
				action: "insertCommissionMembers_action",
				id: id,
				userRole: userRole,
			}
			jQuery.post(
				myajaxurl.ajaxurl,
				data,
				function (response) {
					curRowCnt++
					if (curRowCnt == rowCnt) {
						location.reload()
					}
				})
		}
	})
})

let deleteBtnElems = document.querySelectorAll('.deleteBtn')
deleteBtnElems.forEach(deleteBtn => {
	deleteBtn.addEventListener('click', () => {
		id = deleteBtn.value
		data = {
			action: "deleteCommissionMembers_action",
			id: id,
			userRole: userRole,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				location.reload()
			})
	})

});