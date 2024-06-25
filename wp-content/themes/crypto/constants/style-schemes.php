<?php
define("ID_FRONT", (int) get_option('page_on_front'));
define('ID_BLOG', url_to_post_id('blog', 'page'));
define('ID_NEWS', url_to_post_id('news', 'page'));
define('ID_GAMES', url_to_post_id('games', 'page'));
define('ID_ECOSYSTEM', url_to_post_id('ecosystems', 'page'));
define('ID_PROJECTS', url_to_post_id('projects', 'page'));
define('ID_AIRDROPS', url_to_post_id('airdrops', 'page'));
const TEMPLATES_DI_STYLE = [
    'PAGES' => [
        'FRONT_PAGE'      => 'front',
        'BLOG_PAGE'       => 'blog',
        'NEWS_PAGE'       => 'news',
        'GAMES_PAGE'      => 'games',
        'PROJECTS_PAGE'   => 'projects',
        'AIRDROPS_PAGE'   => 'airdrops',
        'ECOSYSTEMS_PAGE' => 'ecosystems',
        'DEFAULT'         => 'default'
    ],
    'POSTS' => [
        'BLOG'      => 'blogPost',
        'GAME'      => 'game',
        'AIRDROP'   => 'airdrop',
        'ECOSYSTEM' => 'ecosystem',
        'NEWS'      => 'newsPost',
        'PROJECT'   => 'project',
        'DEFAULT'   => 'default'
    ],
    'CATEGORY' => [
        'DEFAULT' => 'default'
    ],
    'TAX' => [
        'BLOG_TAX' => 'blogTax',
        'AIRDROP_TAX' => 'airdropTax',
        'NEWS_TAX' => 'newsTax',
        'GAME_TAX' => 'gameTax',
        'DEFAULT' => 'default'
    ]
];