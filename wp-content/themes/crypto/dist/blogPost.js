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
	let parentIdComment = 0
	const TRANSLATE = {
		ERROR_FILLING_FORM: {
			RU: 'Ошибка при заполнении формы',
			UA: 'Помилка заповнення форми'
		},
		COMMENT_SENT_MODERATION: {
			RU: 'Ошибка при заполнении формы',
			UA: 'Помилка заповнення форми'
		}
	}
	const lang = 'RU'
	const parentLinkComment = document.querySelectorAll('.parent_link_comment')
	if (parentLinkComment) {
		parentLinkComment.forEach(item => {
			item.addEventListener('click', function () {
				parentIdComment = this.getAttribute('data-parentid')
			})
		})
	}
	const submitComment = document.querySelector('.submit_ajax_comment')
	const form = document.querySelector('#comment_form_ajax')
	form.addEventListener('onsubmit', event => {
		event.preventDefault()
	})
	if (submitComment) {
		submitComment.addEventListener('click', function (event) {
			event.preventDefault()
			const commentFormName = document.querySelector('.comment_form_name')
			const commentFormEmail = document.querySelector('.comment_form_email')
			const commentFormText = document.querySelector('.comment_form_text')
			const sendResult = document.querySelector('.error')
			const postId = submitComment.getAttribute('data-postid')
			const API_URL = '/wp-content/themes/crypto/components/reviews/ajax.php'
			const error = []
			const DAL = {
				sendComment() {
					const name = commentFormName.value
					const email = commentFormEmail.value
					const text = commentFormText.value
					return fetch(API_URL, {
						method: 'POST',
						body: JSON.stringify({ name, email, text, parentIdComment, postId })
					})
						.then(response => response.json())
						.then(data => data)
				}
			}

			if (commentFormName.value === '') error.push(TRANSLATE.ERROR_FILLING_FORM[lang])
			if (commentFormEmail.value === '' && error.length === 0) error.push(TRANSLATE.ERROR_FILLING_FORM[lang])
			if (!commentFormEmail.value.includes('@') && error.length === 0) error.push(TRANSLATE.ERROR_FILLING_FORM[lang])
			if (commentFormText.value === '' && error.length === 0) error.push(TRANSLATE.ERROR_FILLING_FORM[lang])
			if (error.length === 0) {
				;(async () => {
					const data = await DAL.sendComment()
					if (data.result === true) {
						sendResult.classList.remove('error')
						sendResult.classList.add('success')
						sendResult.innerHTML = TRANSLATE.COMMENT_SENT_MODERATION[lang]
						form.reset()
					}
				})()
			} else sendResult.innerHTML = TRANSLATE.ERROR_FILLING_FORM[lang]
		})
	}
}
