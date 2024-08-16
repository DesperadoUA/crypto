const cssDI = ['fonts', 'variable', 'common', 'content', 'header', 'footer', 'nav_menu']
const jsDI = ['common', 'header', 'nav_menu']
const defaultDI = { DEFAULT: { js: jsDI, css: cssDI, fileName: 'default' } }
module.exports.schemas = {
	PAGES: {
		FRONT_PAGE: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq', 'blog_card', 'news_card', 'section_title', 'game_card', 'airdrop_card']),
			fileName: 'front'
		},
		BLOG_PAGE: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq', 'blog_card', 'category_links', 'breadcrumb']),
			fileName: 'blog'
		},
		NEWS_PAGE: {
			js: jsDI.concat([]),
			css: cssDI.concat(['news_card', 'category_links', 'breadcrumb']),
			fileName: 'news'
		},
		GAMES_PAGE: {
			js: jsDI.concat([]),
			css: cssDI.concat(['category_links', 'game_card', 'breadcrumb']),
			fileName: 'games'
		},
		PROJECTS_PAGE: {
			js: jsDI.concat([]),
			css: cssDI.concat(['category_links', 'breadcrumb']),
			fileName: 'projects'
		},
		AIRDROPS_PAGE: {
			js: jsDI.concat([]),
			css: cssDI.concat(['category_links', 'breadcrumb', 'airdrop_card']),
			fileName: 'airdrops'
		},
		ECOSYSTEMS_PAGE: {
			js: jsDI.concat([]),
			css: cssDI.concat(['category_links', 'breadcrumb']),
			fileName: 'ecosystems'
		},
		...defaultDI
	},
	POSTS: {
		BLOG: {
			js: jsDI.concat(['faq', 'reviews']),
			css: cssDI.concat(['faq', 'banner', 'reviews', 'breadcrumb']),
			fileName: 'blogPost'
		},
		AIRDROP: {
			js: jsDI.concat([]),
			css: cssDI.concat(['breadcrumb', 'airdrop_top']),
			fileName: 'airdropPost'
		},
		ECOSYSTEM: {
			js: jsDI.concat([]),
			css: cssDI.concat(['breadcrumb']),
			fileName: 'ecosystemPost'
		},
		GAME: {
			js: jsDI.concat([]),
			css: cssDI.concat(['breadcrumb', 'game_top']),
			fileName: 'gamePost'
		},
		NEWS: {
			js: jsDI.concat([]),
			css: cssDI.concat(['breadcrumb']),
			fileName: 'newsPost'
		},
		PROJECT: {
			js: jsDI.concat([]),
			css: cssDI.concat(['breadcrumb']),
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
			css: cssDI.concat(['faq', 'blog_card', 'category_links', 'breadcrumb']),
			fileName: 'blogTax'
		},
		AIRDROP_TAX: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq', 'category_links', 'breadcrumb', 'airdrop_card']),
			fileName: 'airdropTax'
		},
		NEWS_TAX: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq', 'news_card', 'category_links', 'breadcrumb']),
			fileName: 'newsTax'
		},
		GAME_TAX: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq', 'category_links', 'game_card', 'breadcrumb']),
			fileName: 'gameTax'
		},
		...defaultDI
	}
}
