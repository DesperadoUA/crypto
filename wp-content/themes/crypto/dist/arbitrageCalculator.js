const LANG = document.querySelector('html').lang
const TRANSLATE = {
	READ_MORE: {
		ua: 'Читати далі',
		ru: 'Читать далее'
	}
}
{
	const refButtons = document.querySelectorAll('.ref_activate')
	refButtons.forEach(btn => {
		btn.addEventListener('click', () => {
			if (btn.dataset.href) window.open(btn.dataset.href, '_blank')
		})
	})
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
	const price_1 = document.querySelector('#price_1')
	const price_2 = document.querySelector('#price_2')
	const salesCommission = document.querySelector('#sales_commission')
	const withdrawal = document.querySelector('#withdrawal')
	const purchaseCommission = document.querySelector('#purchase_commission')
	const result = document.querySelector('#result')
	const btn = document.querySelector('#calculate_btn')
	btn.addEventListener('click', () => {
		const value =
			Number(price_2.value) -
			Number(price_1.value) -
			Number(salesCommission.value) -
			Number(withdrawal.value) -
			Number(purchaseCommission.value)
		result.innerHTML =
			value >= 0 ? `<span class='text_green'>${value}</span>` : `<span class='text_red'>${value}</span>`
	})
}
