const LANG = document.querySelector('html').lang
const TRANSLATE = {
	READ_MORE: {
		ua: 'Читати далі',
		ru: 'Читать далее'
	}
}
{
    function menu () {
        const burger = document.querySelector('#burger')
        const burgerClose = document.querySelector('#burger-close')
        const containerMenu = document.querySelector('#container-menu')
        burger.addEventListener('click', () => {
            containerMenu.classList.add('show_menu')
        })
        burgerClose.addEventListener('click', () => {
            containerMenu.classList.remove('show_menu')
        })
    }
    menu()
}{
	document.addEventListener('DOMContentLoaded', () => {
		const contentContainer = document.querySelector('.cms')
		const navMenuItems = document.querySelectorAll('.nav_menu_item')
		if (contentContainer && navMenuItems.length) {
			const headings = []
			const urlHash = window.location.hash
			contentContainer.querySelectorAll('h2').forEach(heading => headings.push(heading))
			contentContainer.querySelectorAll('h3').forEach(heading => headings.push(heading))
			contentContainer.querySelectorAll('h4').forEach(heading => headings.push(heading))
			contentContainer.querySelectorAll('h5').forEach(heading => headings.push(heading))
			contentContainer.querySelectorAll('h6').forEach(heading => headings.push(heading))
			headings.forEach(item => {
				navMenuItems.forEach(menuItem => {
					if (menuItem.innerText === item.innerText) {
						const [domain, hash] = menuItem.href.split('#')
						item.id = hash
					}
				})
			})
			if (urlHash) {
				document.querySelector(urlHash).scrollIntoView({ block: 'center', behavior: 'smooth' })
			}
		}
	})
}
{
	const containers = document.querySelectorAll('.video_container')
	if (containers.length) {
		const playButtons = document.querySelectorAll('.video_play')
		playButtons.forEach(btn => {
			btn.addEventListener('click', () => {
				const { src } = btn.dataset
				btn.parentElement.parentElement.innerHTML = `<iframe 
					width="100%" 
					height="100%" 
					src="${src}" 
					frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
					referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
				</iframe>`
			})
		})
	}
}
{
    function faq() {
        const faqAccordions = document.querySelectorAll('.faq_question')
        if(faqAccordions.length) {
            faqAccordions.forEach(item => {
                item.addEventListener('click', function () {
                    if(this.classList.contains('faq_active')) {
                        this.classList.remove('faq_active')
                        this.nextElementSibling.classList.remove('fadeIn')
                    }
                    else {
                        this.classList.add('faq_active')
                        this.nextElementSibling.classList.add('fadeIn')
                    }
                })
            })
        }
    }
    faq()
}{
	const buttons = document.querySelectorAll('.loader_btn')
	if (buttons.length) {
		buttons.forEach(btn => {
			btn.addEventListener('click', () => {
				btn.setAttribute('data-start', 'true')
				if (!btn.classList.contains('init')) {
					const element = document.createElement('script')
					element.src = `/wp-content/themes/crypto/loader/script.js`
					document.querySelector('body').appendChild(element)
					buttons.forEach(item => {
						item.classList.add('init')
					})
				}
			})
		})
	}
}
