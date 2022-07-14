let submitBtn = document.querySelector('.form__submit')
let form = document.querySelector('form')
let userID = document.querySelector('.userID').textContent
submitBtn.addEventListener('click', () => {
	let mkkID = document.querySelector('#mkkID').value
	let mkkName = document.querySelector('#mkkName').value
	let mkkPowers = document.querySelector('#mkkPowers').value
	let mkkHead = null
	let dateFrom = document.querySelector('#dateFrom').value
	dateTo = document.querySelector('#dateTo').value
	if (userID == '100-00') {
		mkkHead = document.querySelector('#mkkHead').value
	}
	if (mkkHead == null) {
		mkkHead = userID
	}
	console.log(mkkHead);
	let mkkEmail = document.querySelector('#mkkEmail').value
	if (mkkID && mkkName && mkkPowers && mkkEmail && mkkHead != 'notChosen') {
		document.querySelector('html').classList.add('wait')
		var data = {
			action: "insertMKK_action",
			mkkID: mkkID,
			mkkName: mkkName,
			mkkPowers: mkkPowers,
			mkkHead: mkkHead,
			mkkEmail: mkkEmail,
			dateFrom: dateFrom,
			dateTo: dateTo,

		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				document.querySelector('html').classList.remove('wait')
				if (response.length > 1) {
					alert(response)
				}
				else {
					alert('Данные от аккунта МКК отправлены на введенный email')
					location.reload()
				}
			}
		)
	}
	else {
		alert('Заполните все поля')
	}



})

form.addEventListener('submit', (e) => {
	e.preventDefault()
})