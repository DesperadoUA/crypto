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
