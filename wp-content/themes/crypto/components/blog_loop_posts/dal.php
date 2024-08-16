<?php
global $builder;
global $post;
$ids = carbon_get_post_meta($post->ID, FIELDS_KEY['RELATIVE_BLOG']);
echo $builder->blogLoop(blogCard($ids));