{
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
