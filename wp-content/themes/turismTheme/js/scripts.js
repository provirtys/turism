"use strict"

let isMobile

if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
	document.body.classList.add("touch")
	isMobile = true
} else {
	document.body.classList.add("pc")

}

let liElems = document.querySelectorAll('li')
liElems.forEach(li => {
	if (li.querySelector('.sub-menu')) {
		let a =li.querySelector('a')
		a.insertAdjacentHTML('afterend', '<span class="menu__arrow"></span>')
	}
})


if (isMobile) {
	let menuArrows = document.querySelectorAll('.menu__arrow')
	if (menuArrows.length > 0) {
		menuArrows.forEach(arrow => {
			arrow.addEventListener("click", () => {
				arrow.parentElement.classList.toggle('active')
			})
		});

	}
}

var iconMenu = document.querySelector(".menu__icon")
if (iconMenu) {
	let menuBody = document.querySelector('.menu__body')
	iconMenu.addEventListener('click', () => {
		document.body.classList.toggle('lock')
		iconMenu.classList.toggle('active')
		menuBody.classList.toggle('active')

	})
}



