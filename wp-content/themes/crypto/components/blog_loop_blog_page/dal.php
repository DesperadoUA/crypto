<?php
global $builder;
$posts = get_public_post_id(BLOG_POST_TYPE, NUMBER_POST_ON_QUERY_BLOG);
echo $builder->blogLoop(blogCard($posts));