<?php
global $post;
global $builder;
$title = TRANSLATE['FAQ'][LANG];
$posts = [];
$list = [];
if(is_page() or is_single()) {
    $list = carbon_get_post_meta($post->ID, FIELDS_KEY['FAQ']);
}
elseif(is_category()) {
    global $cat;
    $list = carbon_get_term_meta($cat->term_id, FIELDS_KEY['FAQ']);
}
elseif (is_tax()) {
    $list = carbon_get_term_meta(get_queried_object()->term_id, FIELDS_KEY['FAQ']);
}
foreach ($list as $item) $posts[] = new FaqItem($item['value_1'], $item['value_2']);
if(!empty($posts)) echo $builder->faq(new Faq($title, $posts));