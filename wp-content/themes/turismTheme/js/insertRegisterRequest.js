"use strict"

let submitBtn = document.querySelector('.form__submit')
let form = document.querySelector('form')



submitBtn.addEventListener('click', () => {
	let role = document.querySelector("#role").value
	let name = document.querySelector('#name').value
	let login = document.querySelector('#login').value
	let password = document.querySelector('#password').value
	let email = document.querySelector('#email').value

	if (name != "" && login != "" && password != "") {
		let data = {
			action: "insertRegisterRequest_action",
			role: role,
			name: name,
			login: login,
			password: password,
			email: email,
		}

		console.log(data);

		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				if (response[0]) {
					alert("Заявка успешно отправлена, ожидайте уведомление на почту")
					location.href = response[1];
				}
				else {
					alert("Данный логин или email уже занят, попробуйте другой")
				}
			},
			"json"
			);
	}
	else {
		alert("Пожалуйста, заполните все поля")
	}
})

form.addEventListener("submit", (e) => {
	e.preventDefault()
})