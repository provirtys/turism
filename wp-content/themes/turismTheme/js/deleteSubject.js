"use strict";
startPage();

function startPage(){
let deleteBtnElems = document.querySelectorAll(".deleteBtn");


deleteBtnElems.forEach((deleteBtn) => {
	deleteBtn.addEventListener("click", () => {
		let id_subject = deleteBtn.closest("td").nextElementSibling.textContent;
		var data = {
			action: "deleteSubject_action",
			id_subject: id_subject,
		}
		jQuery.post(
			myajaxurl.ajaxurl,
			data,
			function (result) {
				let tbody = document.querySelector('tbody');

				tbody.animate({ opacity: 0.5 }, 500)
				let stringTbody = '';

				result.forEach(subject=>{
					stringTbody += `
					<tr>
					<td>
							<button class="deleteBtn tableBtn">
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

						</td>
						<td>`+ subject['ID_subject'] + `</td>
						<td>`+ subject['Name'] + `</td>
					</tr>`;
				})
					tbody.innerHTML = stringTbody;
					tbody.animate({ opacity: 1 }, 500)


					startPage();


			}, 
			"json"
			);
	})
})
}
