<?php
global $builder;
$posts = get_public_post_id(BLOG_POST_TYPE, 16);
echo $builder->blogLoop(blogCard($posts));