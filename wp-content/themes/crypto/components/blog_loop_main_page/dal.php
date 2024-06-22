<?php
global $builder;
$posts = get_public_post_id(BLOG_POST_TYPE, 15);
echo $builder->blogLoop(blogCard($posts));