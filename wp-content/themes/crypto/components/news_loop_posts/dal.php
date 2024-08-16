<?php
global $builder;
global $post;
$ids = carbon_get_post_meta($post->ID, FIELDS_KEY['RELATIVE_NEWS']);
echo $builder->newsLoop(newsCard($ids));