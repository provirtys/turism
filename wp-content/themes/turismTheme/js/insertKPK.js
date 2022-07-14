let submitBtn = document.querySelector('.form__submit')
let form = document.querySelector('form')
let userID = document.querySelector('.userID').textContent
submitBtn.addEventListener('click', () => {
	let kpkID = document.querySelector('#kpkID').value
	let kpkName = document.querySelector('#kpkName').value
	let kpkLvl = null
	let kpkHead = null
	let dateFrom = null
	let dateTo = null
	if (userID.substring(0, 6) == '100-00') {
		kpkHead = document.querySelector('#kpkHead').value
		kpkLvl = document.querySelector('#kpkLvl').value
		dateFrom = document.querySelector('#dateFrom').value
		dateTo = document.querySelector('#dateTo').value
	}
	if (kpkHead == null) {
		kpkHead = userID
	}
	let mkk = document.querySelector('#mkk').value

	let kpkEmail = document.querySelector('#kpkEmail').value
	if (kpkID && kpkName && kpkLvl != 'notChosen' && kpkEmail && kpkHead != 'notChosen') {
		document.querySelector('html').classList.add('wait')
		var data = {
			action: "insertKPK_action",
			kpkID: kpkID,
			kpkName: kpkName,
			kpkLvl: kpkLvl,
			kpkHead: kpkHead,
			kpkEmail: kpkEmail,
			dateFrom: dateFrom,
			dateTo: dateTo,
			mkk: mkk,

		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				document.querySelector('html').classList.remove('wait')
				console.log(response);
				if (response.length > 1) {
					alert(response)
				}
				else {
					alert('Данные от аккунта КПК отправлены на введенный email')
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