const navBtn = document.querySelector('.nav__btn')
const navClose = document.querySelector('.nav__close')
const navOverlay = document.querySelector('.nav__overlay')
const navMenu = document.querySelector('.nav__menu')
const navSubmenus = document.querySelectorAll('.nav__submenu')
const togglers = document.querySelectorAll('.nav__arrow')

const handleNav = () => {
	navMenu.classList.add('active')
	navOverlay.classList.add('active')
}

const closeNav = () => {
	navMenu.classList.remove('active')
	navOverlay.classList.remove('active')
}

const handleTogglers = () => {
	togglers.forEach(toggler => {
		toggler.addEventListener('click', event => {
			const submenu = toggler.closest('.nav__item').querySelector('.nav__submenu')
			if (submenu) {
				submenu.classList.toggle('active')
			}
		})
	})
}

handleTogglers()

navBtn.addEventListener('click', handleNav)
navClose.addEventListener('click', closeNav)
