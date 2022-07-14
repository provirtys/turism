

let submitBtn = document.querySelector(".form__submit")
let form = document.querySelector('form')
submitBtn.addEventListener('click', () => {
	let name = document.querySelector('#name').value
	let type = document.querySelector('#typeSchool').value
	let mkk = document.querySelector('#mkk').value
	data = {
		action: "editSchool_action",
		name: name,
		type: type,
		mkk: mkk,
	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			// console.log(response);
			location.reload()
		})
})

form.addEventListener('submit', (e) => {
	e.preventDefault();
})