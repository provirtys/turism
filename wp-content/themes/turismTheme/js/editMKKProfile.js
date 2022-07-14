
let submitBtn = document.querySelector(".form__submit")
let form = document.querySelector('form')
let userID = document.querySelector(".userID").textContent
submitBtn.addEventListener('click', () => {
	let name = document.querySelector('#name').value
	let head = null
	if (userID != '100-00') {
		head = document.querySelector('#head_mkk').value
	}
	let chairman = document.querySelector('#chairmanSelect').value
	data = {
		action: "editMKKProfile_action",
		name: name,
		head: head,
		chairman: chairman,
	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			location.reload()
		})
})

form.addEventListener('submit', (e) => {
	e.preventDefault();
})