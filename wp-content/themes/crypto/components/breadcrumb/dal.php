<?php
global $builder;
$list = [];
$home_url = get_home_url();
$list[] = new LinkItem(TRANSLATE['EARNINGS_ON_CRYPT'][LANG], $home_url);
$config_relatives_page_post_type = [
    BLOG_POST_TYPE => ID_BLOG,
    NEWS_POST_TYPE => ID_NEWS,
    GAME_POST_TYPE => ID_GAMES,
    ECOSYSTEM_POST_TYPE => ID_ECOSYSTEM,
    PROJECT_POST_TYPE => ID_PROJECTS,
    AIRDROP_POST_TYPE => ID_AIRDROPS
];
$config_relatives_page_taxonomy = [
    BLOG_TAX => ID_BLOG,
    NEWS_TAX => ID_NEWS,
    GAME_TAX => ID_GAMES,
    AIRDROP_TAX => ID_AIRDROPS
];
if(is_page()) {
    global $post;
    $link = get_permalink($post);
    $list[] = new LinkItem($post->post_title, $link);
}
elseif(is_single()) {
    global $post;
    $page_link = '';
    if (array_key_exists($post->post_type, $config_relatives_page_post_type)) {
        $page = get_post($config_relatives_page_post_type[$post->post_type]);
        $page_link = get_permalink($page);
        $list[] = new LinkItem($page->post_title, $page_link);
    }
    $list[] = new LinkItem($post->post_title, get_permalink($post));
}
elseif (is_tax() or is_category()) {
    $tax = get_queried_object();
    $page_link = '';
    if (array_key_exists($tax->taxonomy, $config_relatives_page_taxonomy)) {
        $page = get_post($config_relatives_page_taxonomy[$tax->taxonomy]);
        $page_link = get_permalink($page);
        $list[] = new LinkItem($page->post_title, $page_link);
    }
    $list[] = new LinkItem($tax->name, get_term_link($tax->slug, $tax->taxonomy));
}
echo $builder->breadcrumb(new LinkList($list));