<?php
global $post;
global $builder;
if(is_404()) {
    $headData = new HeadData(
        TRANSLATE['PAGE_NOT_FOUND'][LANG],
        TRANSLATE['PAGE_NOT_FOUND'][LANG]
    );
    echo $builder->wp_head($headData);
} else {
    if($post->ID === ID_FRONT or is_single() or is_page()) {
        $headData = new HeadData(
            (string)carbon_get_post_meta($post->ID, FIELDS_KEY['META_TITLE']),
            (string)carbon_get_post_meta($post->ID, FIELDS_KEY['DESCRIPTION'])
        );
    }
    else if(is_category() or is_tax()) {
        $category = get_queried_object();
        $headData = new HeadData(
            (string)carbon_get_term_meta($category->term_id, FIELDS_KEY['META_TITLE']),
            (string)carbon_get_term_meta($category->term_id, FIELDS_KEY['DESCRIPTION'])
        );
    }
    else {
        $headData = new HeadData(
            TRANSLATE['PAGE_NOT_FOUND'][LANG],
            TRANSLATE['PAGE_NOT_FOUND'][LANG]
        );
    }
    echo $builder->wp_head($headData);
} 