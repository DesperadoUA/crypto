<?php
global $post, $builder;
$ecosystemIds = carbon_get_post_meta($post->ID, FIELDS_KEY['RELATIVE_ECOSYSTEM']);
$ecosystem = null;
if(!empty($ecosystemIds)) {
    $ecosystemPost = get_post($ecosystemIds[0]);
    $ecosystem = new LinkItem($ecosystemPost->post_title, "/{$ecosystemPost->post_type}/{$ecosystemPost->post_name}/"); 
}
$activity_keys = carbon_get_post_meta($post->ID, FIELDS_KEY['ACTIVITY']);
$activity = [];
if(!empty($activity_keys)) foreach($activity_keys as $key) $activity[] = TRANSLATE[$key][LANG];
$data = new AirdropCardTop(
    $post->post_title,
    get_img_item(get_post_thumbnail_id($post)),
    (string)carbon_get_post_meta($post->ID, FIELDS_KEY['BONUS']),
    (string)carbon_get_post_meta($post->ID, FIELDS_KEY['REF']),
    $activity,
    carbon_get_post_meta($post->ID, FIELDS_KEY['PROJECT_AWARD']),
    TRANSLATE[carbon_get_post_meta($post->ID, FIELDS_KEY['AIRDROP_STATUS'])][LANG],
    (string)carbon_get_post_meta($post->ID, FIELDS_KEY['AIRDROP_STATUS']),
    $ecosystem
);
echo $builder->airdropCardTop($data);