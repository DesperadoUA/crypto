<?php
global $post;
global $builder;
$imageId = 0;
if(is_single()) {
    $imageId = carbon_get_post_meta($post->ID, FIELDS_KEY['BANNER']);
}
if(!empty($imageId)) echo $builder->banner(get_img_item($imageId));
