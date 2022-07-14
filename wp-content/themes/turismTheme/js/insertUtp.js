"use strict"

var submitBtn = $('.form__submit');
var form = $('form');
var orderDate = document.querySelector('#orderDate');
var data

submitBtn.on('click', function () {
	var nameUtp = $('input[name=nameUtp]');
	var dateFromUtp = $('.periodFrom');
	var dateToUtp = $('.periodTo');
	var typeUtp = $('select[name=typeUtp');
	var difficultyUtp = $('input[name=difficultyUtp]');
	var leaderUtp = $('select[name=leaderUtp]');
	var supplyUtp = $('select[name=supplyUtp]');
	var medicUtp = $('select[name=medicUtp]');
	var regionUtp = $('input[name=regionUtp]');
	var tableCheckBoxArr = document.querySelectorAll("input[type='checkbox']:checked")
	var checkedValues = Array.from(tableCheckBoxArr).map(cb => cb.value)
	//Выставление времени 
	var d = new Date();
	var day = d.getDate(); if (day < 10) day = '0' + day;
	var month = d.getMonth() + 1; if (month < 10) month = '0' + month;
	var year = d.getFullYear();
	orderDate.value = year + "-" + month + "-" + day;

	var id_order;
	//Добавление приказа
	data = {
		action: "insertOrder_action",
		id_typeOfOrder: 20,
		date: orderDate.value,
	}
	jQuery.post(
		myajaxurl.ajaxurl,
		data,
		function (response) {
			id_order = response;
			data = {
				action: "insertUtp_action",
				name: nameUtp.val(),
				id_type_of_utp: typeUtp.val(),
				id_order: id_order,
				difficulty: difficultyUtp.attr('data-difficultyUtp'),
				start_date: dateFromUtp.val(),
				end_date: dateToUtp.val(),
				leader: leaderUtp.val(),
				supply: supplyUtp.val(),
				medic: medicUtp.val(),
				region: regionUtp.val(),
			}
			console.log(data);

			jQuery.post(
				myajaxurl.ajaxurl,
				data,
				function (response) {
					location.href = response
				}
			)
		}
	)
})

//Валидация даты похода относительно даты проведения школы
var dateInputElems = document.querySelectorAll('.period')
var schoolStartDateInput = document.querySelector('.schoolStartDate')
var schoolEndDateInput = document.querySelector('.schoolEndDate')
var validating = false
dateInputElems.forEach(dateInput => {
	dateInput.addEventListener('blur', (e) => {
		e.preventDefault()
		if ((dateInput.value <= schoolStartDateInput.value || dateInput.value >= schoolEndDateInput.value) && dateInput.value != "") {
			if (validating == false) {
				validating = true
				alert("Выберите подходящую дату");
				setTimeout(function () {
					dateInput.value = ""
					dateInput.focus();
					validating = false;
				}, 1);
			}
		}
	})
});

form.submit(function (e) {
	e.preventDefault();
})

//Сортировка
var sortCol = null
var isCheckBox = false
function sortTable(n) {
	isCheckBox = false
	sortCol = n
	if (n == 0) {
		isCheckBox = true
	}
	var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
	table = document.querySelector("table")

	switching = true;
	dir = "asc";

	while (switching) {
		switching = false;
		rows = table.getElementsByTagName("tr");
		for (i = 1; i < (rows.length - 1); i++) {
			shouldSwitch = false;
			x = rows[i].getElementsByTagName("td")[n];
			y = rows[i + 1].getElementsByTagName("td")[n];
			if (dir == "asc") {
				//Если чекбокс
				if (isCheckBox) {
					if (x.querySelector('input').checked && !y.querySelector('input').checked) {
						console.log("as");
						shouldSwitch = true
						break
					}
				}
				else {
					if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
						shouldSwitch = true;
						break;
					}
				}

			} else if (dir == "desc") {
				if (isCheckBox) {
					if (!x.querySelector('input').checked && y.querySelector('input').checked) {
						shouldSwitch = true
						break
					}
				}
				else {
					if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
						shouldSwitch = true;
						break;
					}
				}

			}
		}
		if (shouldSwitch) {
			rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
			switching = true;
			switchcount++;
		} else {
			if (switchcount == 0 && dir == "asc") {
				dir = "desc";
				switching = true;
			}
		}
	}
}

//Поиск по таблице
function tableSearch() {
	var phrase = document.getElementById('search-text');
	var table = document.getElementById('info-table');
	var regPhrase = new RegExp(phrase.value, 'i');
	var flag = false;
	for (var i = 1; i < table.rows.length; i++) {
		flag = false;
		for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
			flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
			if (flag) break;
		}
		if (flag) {
			table.rows[i].style.display = "";
		} else {
			table.rows[i].style.display = "none";
		}

	}
}

