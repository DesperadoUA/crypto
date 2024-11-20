<?php
global $post;
global $builder;
$ogUrl = get_site_url() . URL;
$ogImage = get_site_url() . DEFAULT_SOCIAL_IMG;
if(is_404()) {
    $headData = new HeadData(
        TRANSLATE['PAGE_NOT_FOUND'][LANG],
        TRANSLATE['PAGE_NOT_FOUND'][LANG],
        $ogUrl,
        $ogImage
    );
    echo $builder->wp_head($headData);
} else {
    if($post->ID === ID_FRONT or is_single() or is_page()) {
        $thumbnail = get_the_post_thumbnail_url($post->ID);
        if(!empty($thumbnail)) $ogImage = $thumbnail;
        $headData = new HeadData(
            (string)carbon_get_post_meta($post->ID, FIELDS_KEY['META_TITLE']),
            (string)carbon_get_post_meta($post->ID, FIELDS_KEY['DESCRIPTION']),
            $ogUrl,
            $ogImage
        );
    }
    else if(is_category() or is_tax()) {
        $category = get_queried_object();
        $headData = new HeadData(
            (string)carbon_get_term_meta($category->term_id, FIELDS_KEY['META_TITLE']),
            (string)carbon_get_term_meta($category->term_id, FIELDS_KEY['DESCRIPTION']),
            $ogUrl,
            $ogImage
        );
    }
    else {
        $headData = new HeadData(
            TRANSLATE['PAGE_NOT_FOUND'][LANG],
            TRANSLATE['PAGE_NOT_FOUND'][LANG],
            $ogUrl,
            $ogImage
        );
    }
    echo $builder->wp_head($headData);
} 