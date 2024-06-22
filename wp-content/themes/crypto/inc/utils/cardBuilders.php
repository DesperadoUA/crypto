<?php
function blogCard($arr_id):BlogCardList {
    $data = [];
    foreach ($arr_id as $item) {
        $currentPost = get_post( $item );
        $data[] = new BlogCardItem(
            $currentPost->post_title,
            "/{$currentPost->post_type}/{$currentPost->post_name}/",
            (string)get_the_post_thumbnail_url($item, 'full'),
            $currentPost->post_excerpt,
            mb_strimwidth($currentPost->post_date, 0, 10)
        );
    }
    return new BlogCardList($data);
}
function newsCard($arr_id):NewsCardList {
    $data = [];
    foreach ($arr_id as $item) {
        $currentPost = get_post( $item );
        $data[] = new NewsCardItem(
            $currentPost->post_title,
            "/{$currentPost->post_type}/{$currentPost->post_name}/",
            (string)get_the_post_thumbnail_url($item, 'full'),
            $currentPost->post_excerpt,
            mb_strimwidth($currentPost->post_date, 0, 10)
        );
    }
    return new NewsCardList($data);
}
function gameCard($arr_id):GameCardList {
    $data = [];
    foreach ($arr_id as $item) {
        $currentPost = get_post( $item );
        $ecosystemIds = carbon_get_post_meta($currentPost->ID, FIELDS_KEY['RELATIVE_ECOSYSTEM']);
        $ecosystem = null;
        if(!empty($ecosystemIds)) {
            $ecosystemPost = get_post($ecosystemIds[0]);
            $ecosystem = new LinkItem($ecosystemPost->post_title, "/{$ecosystemPost->post_type}/{$ecosystemPost->post_name}/"); 
        }
        $data[] = new GameCardItem(
            $currentPost->post_title,
            "/{$currentPost->post_type}/{$currentPost->post_name}/",
            (string)get_the_post_thumbnail_url($item, 'full'),
            $currentPost->post_excerpt,
            (string)carbon_get_post_meta($currentPost->ID, FIELDS_KEY['BONUS']),
            (string)carbon_get_post_meta($currentPost->ID, FIELDS_KEY['REF']),
            $ecosystem
        );
    }
    return new GameCardList($data);
}