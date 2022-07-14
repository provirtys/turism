
let table = document.querySelector('table')
let tableBody = table.querySelector('tbody')
let tableBodyString = ''
let noRows = document.querySelector('.no-rows')
start()

function start() {
	if(table.rows.length>1){
	table.removeAttribute('hidden')
	noRows.setAttribute('hidden','')

	let acceptBtns = document.querySelectorAll(".acceptBtn")
	let declineBtns = document.querySelectorAll(".declineBtn")



	acceptBtns.forEach(acceptBtn => {
		acceptBtn.addEventListener("click", () => {
			login = acceptBtn.parentElement.parentElement.querySelectorAll('td')[2].textContent
			data = {
				action: "acceptRegisterRequest_action",
				login: login,

			}
			jQuery.post(
				myajaxurl.ajaxurl,
				data,
				function (response) {
					changeTable(response)
				},
				"json"
			);
		})
	})

	declineBtns.forEach(declineBtn => {
		declineBtn.addEventListener("click", () => {
			login = declineBtn.parentElement.parentElement.querySelectorAll('td')[2].textContent
			data = {
				action: "declineRegisterRequest_action",
				login: login,

			}
			jQuery.post(
				myajaxurl.ajaxurl,
				data,
				function (response) {
					changeTable(response)
				},
				"json"
			);
		})
	})
}
	else{
		noRows.removeAttribute('hidden')
		table.setAttribute('hidden','')
	}
}


function changeTable(response) {
	tableBodyString = ''
		response.forEach(el => {
			tableBodyString += '<tr> <td>' + el['Role'] +
				'</td> <td>' + el['Name'] +
				'</td> <td>' + el['Login'] +
				'</td> <td>' + el['Email'] + '</td> <td class="tdRegister">' +
				'<button class="tableBtn acceptBtn"><svg class="tableImg tableImg-accept" version=" 1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve"><g><path d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M165,300c-74.44,0-135-60.561-135-135S90.56,30,165,30s135,60.561,135,135S239.439,300,165,300z" /><path d="M226.872,106.664l-84.854,84.853l-38.89-38.891c-5.857-5.857-15.355-5.858-21.213-0.001c-5.858,5.858-5.858,15.355,0,21.213l49.496,49.498c2.813,2.813,6.628,4.394,10.606,4.394c0.001,0,0,0,0.001,0				c3.978,0,7.793-1.581,10.606-4.393l95.461-95.459c5.858-5.858,5.858-15.355,0-21.213				C242.227,100.807,232.73,100.806,226.872,106.664z" />		</g>	</svg></button>' +
				`</td><td class="tdRegister">
	<button class="tableBtn declineBtn">
		<svg version="1.1" class="deleteImg tableImg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
			<g>
				<path d="M17.586,46.414C17.977,46.805,18.488,47,19,47s1.023-0.195,1.414-0.586L32,34.828l11.586,11.586
C43.977,46.805,44.488,47,45,47s1.023-0.195,1.414-0.586c0.781-0.781,0.781-2.047,0-2.828L34.828,32l11.586-11.586
c0.781-0.781,0.781-2.047,0-2.828c-0.781-0.781-2.047-0.781-2.828,0L32,29.172L20.414,17.586c-0.781-0.781-2.047-0.781-2.828,0
c-0.781,0.781-0.781,2.047,0,2.828L29.172,32L17.586,43.586C16.805,44.367,16.805,45.633,17.586,46.414z" />
				<path d="M32,64c8.547,0,16.583-3.329,22.626-9.373C60.671,48.583,64,40.547,64,32s-3.329-16.583-9.374-22.626
C48.583,3.329,40.547,0,32,0S15.417,3.329,9.374,9.373C3.329,15.417,0,23.453,0,32s3.329,16.583,9.374,22.626
C15.417,60.671,23.453,64,32,64z M12.202,12.202C17.49,6.913,24.521,4,32,4s14.51,2.913,19.798,8.202C57.087,17.49,60,24.521,60,32
s-2.913,14.51-8.202,19.798C46.51,57.087,39.479,60,32,60s-14.51-2.913-19.798-8.202C6.913,46.51,4,39.479,4,32
S6.913,17.49,12.202,12.202z" />
			</g>
		</svg>
	</button>
</td>`
		});
		tableBodyString += `</tr> </tbody>`

	tableBody.innerHTML = tableBodyString
	start()
}