//Сортировка
var sortCol = null
var isCheckBox = false

function sortTable(n) {
	
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