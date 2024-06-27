<?php
global $post;
$ecosystemIds = carbon_get_post_meta($post->ID, FIELDS_KEY['RELATIVE_ECOSYSTEM']);
$ecosystem = null;
$imgId = get_post_thumbnail_id($post);
if(!empty($ecosystemIds)) {
    $ecosystemPost = get_post($ecosystemIds[0]);
    $ecosystem = new LinkItem($ecosystemPost->post_title, "/{$ecosystemPost->post_type}/{$ecosystemPost->post_name}/"); 
}
$data = new GameCardTop(
    $post->post_title,
    get_img_item($imgId),
    (string)carbon_get_post_meta($post->ID, FIELDS_KEY['BONUS']),
    (string)carbon_get_post_meta($post->ID, FIELDS_KEY['REF']),
    $ecosystem
);
echo $builder->gameCardTop($data);