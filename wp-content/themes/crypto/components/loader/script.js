{
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
