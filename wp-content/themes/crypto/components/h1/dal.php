<?php
global $post;
global $builder;
$text = '';
if(is_page() or is_single()) {
    $text = carbon_get_post_meta($post->ID, FIELDS_KEY['H1']);
}
elseif(is_category()) {
    global $cat;
    $text = carbon_get_term_meta($cat->term_id, FIELDS_KEY['H1']);
}
elseif (is_tax()) {
    $text = carbon_get_term_meta(get_queried_object()->term_id, FIELDS_KEY['H1']);
}
if(!empty($text)) echo $builder->h1($text);