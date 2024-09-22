{
	const creatorCard = {
		blog: data => {
			let str = ''
			data.forEach(item => {
				str += `<article class='blog_card border_radius_s'>
                    <div class='wrapper'>
                        <div class='top'>
                            <div class='blog_card_img_wrapper'>
                                <a href='${item.permalink}' title='${item.title}'>
                                    <img class='object_fit_cover border_radius_s' width='100%' height='160px' 
                                    alt='${item.title} logo' 
                                    src='${item.thumbnail}' loading='lazy'>
                                </a>
                            </div>
                        </div>
                        <div class='blog_card_center'>
                            <a href='${item.permalink}' title='${item.title}' class='blog_card_title'>
                                ${item.title}
                            </a>
                            <div class='blog_card_date'>${item.publicDate}</div>
                            <div class='blog_card_desc'>${item.excerpt}</div>
                        </div>
                        <div class='blog_card_bottom'>
                            <a href='${item.permalink}' title='${item.title}' class='blog_card_read_more'>${TRANSLATE['READ_MORE'][LANG]}</a></div></div>
                </article>`
			})
			return str
		}
	}
	class Loader {
		constructor(node) {
			this.api = '/wp-content/themes/crypto/loader/ajax.php'
			this.postType = node.dataset.post_type
			this.taxId = node.dataset.tax_id
			this.numberPostsOnQuery = node.dataset.number_posts_on_query
			this.total = node.dataset.total_posts
			this.container = document.querySelector(`.${node.dataset.container}`)
			this.currentPage = 1
			this.currentElement = node
			this.totalPages = parseInt(this.total / this.numberPostsOnQuery)
			this.currentElement.addEventListener('click', () => {
				this.load()
			})
			if (node.dataset.start) this.load()
		}
		async load() {
			this.currentPage++
			this.remove()
			this.currentElement.disabled = true
			const result = await this.fetch()
			if (result.status === 'ok') {
				this.container.insertAdjacentHTML('beforeEnd', creatorCard[this.postType](result.data.posts))
			}
			this.currentElement.disabled = false
		}
		remove() {
			if (this.currentPage > this.totalPages) this.currentElement.remove()
		}
		async fetch() {
			return await fetch(this.api, {
				method: 'POST',
				body: JSON.stringify({
					currentPage: this.currentPage,
					postType: this.postType,
					taxId: this.taxId
				})
			})
				.then(response => response.json())
				.then(data => data)
		}
	}
	const buttons = document.querySelectorAll('.loader_btn')
	buttons.forEach(btn => {
		new Loader(btn)
	})
}
