"use strict";

let role = document.querySelector('#role');
let staff = document.querySelector('#staff');
let orderDate = document.querySelector('#orderDate');
let subRowSubject = document.querySelectorAll('.form__subrow-subject');
let userRole = document.querySelector('.userRole').textContent

if (role) {
	role.addEventListener("change", () => {
		if (role.value == "staff") {

			staff.removeAttribute("hidden")
			staff.removeAttribute("hidden")
			subRowSubject.forEach((subject) => {
				subject.removeAttribute("hidden")
			})
		}
		else if (role.value == "student") {
			staff.setAttribute("hidden", '')
			subRowSubject.forEach((subject) => {
				subject.setAttribute("hidden", "")
			})
		}
		else {
			staff.setAttribute("hidden", '')
			subRowSubject.forEach((subject) => {
				subject.setAttribute("hidden")
			})
		}
	})
}

var submitBtn = $('.form__submit');
var form = $('form');


submitBtn.on('click', function () {
	var lastNameVal = $('input[name=lastName]').val();
	var firstNameVal = $('input[name=firstName]').val();
	var patronymicVal = $('input[name=patronymic]').val();
	var genderVal = $('select[name=gender]').val();
	var dateOfBirthVal = $('input[name=dateOfBirth]').val();
	var addressVal = $('input[name=address]').val();
	var placeOfWorkVal = $('input[name=placeOfWork]').val();
	var telephoneVal = $('input[name=telephone]').val();
	var emailVal = $('input[name=email]').val();
	var subjectsName = [];
	var i = 0;
	var data = {
		action: "insertPeople_action",
		lastName: lastNameVal,
		firstName: firstNameVal,
		patronymic: patronymicVal,
		gender: genderVal,
		dateOfBirth: dateOfBirthVal,
		address: addressVal,
		placeOfWork: placeOfWorkVal,
		telephone: telephoneVal,
		email: emailVal,
	}
	if (role) {
		if (role.value == "notChosen") {
			alert("Выберите в качестве кого добавить")
		}
		else {
			subRowSubject.forEach((element) => {
				if (element.querySelector('input').checked) {
					subjectsName[i] = element.querySelector('label').textContent;
					i++
				}
			});

			//Добавление человека
			jQuery.post(
				myajaxurl.ajaxurl,
				data,
				function (response) {
					//Выставление времени 
					var d = new Date();
					var day = d.getDate(); if (day < 10) day = '0' + day;
					var month = d.getMonth() + 1; if (month < 10) month = '0' + month;
					var year = d.getFullYear();
					orderDate.value = year + "-" + month + "-" + day;
					if (role.value == "student") {
						var id_people = response;
						var id_order;
						//Добавление приказа
						data = {
							action: "insertOrder_action",
							id_typeOfOrder: 3,
							date: orderDate.value,
						}
						jQuery.post(
							myajaxurl.ajaxurl,
							data,
							function (response) {
								id_order = response;
								data = {
									action: "insertStudent_action",
									id_people: id_people,
									id_order: id_order,
									relevanceDate: orderDate.value,
								}
								//Добавление в качестве студента
								jQuery.post(
									myajaxurl.ajaxurl,
									data,
									function (response) {
										if (response) {
											location.reload()

											// $('input[name=lastName]').val('');
											// $('input[name=firstName]').val('');
											// $('input[name=patronymic]').val('');
											// $('input[name=gender]').val('');
											// $('input[name=dateOfBirth]').val('');
											// $('input[name=address]').val('');
											// $('input[name=placeOfWork]').val('');
											// $('input[name=telephone]').val('');
											// $('input[name=email]').val('');
											// $('select[name=role]').val('notChosen');
											// staff.setAttribute("hidden", '')
										}
									}
								)
							}
						)
					}
					else if (role.value == "staff") {
						var id_people = response;
						var id_order;
						//Добавление приказа
						data = {
							action: "insertOrder_action",
							id_typeOfOrder: 6,
							date: orderDate.value,
						}
						jQuery.post(
							myajaxurl.ajaxurl,
							data,
							function (response) {
								id_order = response;
								var posName = $('#staff').val();
								data = {
									action: "insertIps_action",
									id_people: id_people,
									posName: posName,
									id_order: id_order,
									subjectsName: subjectsName,
									relevanceDate: orderDate.value,
								}
								//Добавление в качестве работника
								jQuery.post(
									myajaxurl.ajaxurl,
									data,
									function (response) {
										location.reload()
										// document.querySelector('.form__resetbtn').click();
										// staff.setAttribute("hidden", '')
										// subRowSubject.forEach((subject) => {
										// 	subject.setAttribute("hidden", "")
										// })

									}
								)
							}
						)


					}

				});

		}
	}

	//Если нет выбора роли(для МКК)
	else {
		let isChairman = document.querySelector('#chairman').checked

		//Добавление человека
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (response) {
				//Выставление времени 
				var d = new Date();
				var day = d.getDate(); if (day < 10) day = '0' + day;
				var month = d.getMonth() + 1; if (month < 10) month = '0' + month;
				var year = d.getFullYear();
				orderDate.value = year + "-" + month + "-" + day;
				var id_people = response;
				var id_order;
				//Добавление приказа
				data = {
					action: "insertOrder_action",
					id_typeOfOrder: 6,
					date: orderDate.value,
				}
				jQuery.post(
					myajaxurl.ajaxurl,
					data,
					function (response) {
						id_order = response;
						data = {
							action: "insertMemberCommissionThroughPeople_action",
							id_people: id_people,
							id_order: id_order,
							isChairman: isChairman
						}
						jQuery.post(
							myajaxurl.ajaxurl,
							data,
							function (response) {
								location.reload()
							})
					})
			})
	}
})

form.submit(function (e) {
	e.preventDefault();
})


