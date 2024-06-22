const cssDI = ['fonts', 'variable', 'common', 'content', 'header', 'footer', 'nav_menu']
const jsDI = ['common', 'header', 'nav_menu']
const defaultDI = { DEFAULT: { js: jsDI, css: cssDI, fileName: 'default' } }
module.exports.schemas = {
	PAGES: {
		FRONT_PAGE: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq', 'blog_card', 'news_card', 'section_title', 'game_card']),
			fileName: 'front'
		},
		BLOG_PAGE: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq', 'blog_card', 'category_links']),
			fileName: 'blog'
		},
		NEWS_PAGE: {
			js: jsDI.concat([]),
			css: cssDI.concat(['news_card', 'category_links']),
			fileName: 'news'
		},
		GAMES_PAGE: {
			js: jsDI.concat([]),
			css: cssDI.concat(['category_links', 'game_card']),
			fileName: 'games'
		},
		...defaultDI
	},
	POSTS: {
		BLOG: {
			js: jsDI.concat(['faq', 'reviews']),
			css: cssDI.concat(['faq', 'banner', 'reviews']),
			fileName: 'blogPost'
		},
		AIRDROP: {
			js: jsDI.concat([]),
			css: cssDI.concat([]),
			fileName: 'airdropPost'
		},
		ECOSYSTEM: {
			js: jsDI.concat([]),
			css: cssDI.concat([]),
			fileName: 'ecosystemPost'
		},
		GAME: {
			js: jsDI.concat([]),
			css: cssDI.concat([]),
			fileName: 'gamePost'
		},
		NEWS: {
			js: jsDI.concat([]),
			css: cssDI.concat([]),
			fileName: 'newsPost'
		},
		PROJECT: {
			js: jsDI.concat([]),
			css: cssDI.concat([]),
			fileName: 'projectPost'
		},
		...defaultDI
	},
	CATEGORY: {
		...defaultDI
	},
	TAX: {
		BLOG_TAX: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq', 'blog_card', 'category_links']),
			fileName: 'blogTax'
		},
		AIRDROP_TAX: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq', 'category_links']),
			fileName: 'airdropTax'
		},
		NEWS_TAX: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq', 'news_card', 'category_links']),
			fileName: 'newsTax'
		},
		GAME_TAX: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq', 'category_links', 'game_card']),
			fileName: 'gameTax'
		},
		...defaultDI
	}
}
