<?php
global $builder;
if(is_category()) {
    $cid = get_query_var('cat');
    $content = do_shortcode(category_description( $cid ));
}
elseif (is_tax()) {
    $category = get_queried_object();
    $content =  (string)carbon_get_term_meta($category->term_id, FIELDS_KEY['CONTENT']);
    $content = do_shortcode($content);
}
elseif (is_front_page()) {
    $id = get_option( 'page_on_front' );
    $post = get_post($id);
    $content = do_shortcode($post->post_content);
}
else {
    global $post;
    $txt = $post->post_content;
    $content = do_shortcode($txt);
}
if(!empty($content)) echo $builder->content($content);